<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');    
    }

    public function index()
    {
        $employe = Employe::all();
        return view('employe/index', compact('employe'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('employe/create', compact('companies'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'company_id' => 'required',
            'phoneNo' => 'required',
            'email' => 'required'
        ]);

        Employe::create($request->all());

        return redirect()->route('employe.index');
    }

    public function edit(Employe $employe, Company $company)
    {
        $companies = Company::all();

        return view('employe.edit', compact('employe', 'companies'));
    }

    public function update(Request $request, Employe $employe)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'company_id' => 'required',
            'phoneNo' => 'required',
            'email' => 'required'
        ]); 

        $employe->update($request->all());

        return redirect()->route('employe.index');
    }

    public function destroy(Employe $employe)
    {
        $employe ->delete(); 

        return redirect()->route('employe.index');
    }
}
