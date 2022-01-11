<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');    
    }

    public function index()
    {
        $company = Company::paginate(10);
        return view('company/index', compact('company'));
    } 

    public function create()
    {
        return view('company/create');
    } 

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'website' => 'required',
            'imagePath' => 'mimes:png,jpg|max:5000|required'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->imagePath->extension(); 
        
        $request->imagePath->move(public_path('images'), $newImageName);

        Company::create([
            'name' => $request->name, 
            'email' => $request->email,
            'address' => $request->address, 
            'website' => $request->website,
            'imagePath' => $newImageName
        ]); 

        return redirect()->route('company.index');
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'website' => 'required'
        ]);

        $company->update($request->all());

        return redirect()->route('company.index');
    }

    public function destroy(Company $company)
    {
        $imagePath = public_path('/images/'. $company->imagePath);
        unlink($imagePath);
        $company->delete(); 

        return redirect()->route('company.index');
    }
}
