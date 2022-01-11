@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3>Create a new Employe</h3>
        </div>
        <div class="card-body">
          {{-- form --}}
          <form action="{{ route("employe.store") }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-6 mb-3">
                <input type="text" class="form-control" placeholder="First Name" name="firstName" >
              </div>
              <div class="col-6 mb-3">
                <input type="text" class="form-control" placeholder="Last Name" name="lastName" >
              </div>
              <div class="col-6">
                  <input type="text" class="form-control" placeholder="Phone No" name="phoneNo">
                </div>
              <div class="col-12 mt-3">
                <input type="text" class="form-control" placeholder="Email" name="email">
              </div>
              <div class="col-12 mt-3">
                <select name="company_id" class="form-select">
                    @foreach ($companies as $company)
                      <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                  </select>    
              </div>
            </div>
            <div class="col-12 mt-3">
              <button type="submit" class="btn btn-primary float-end">Create</button>
            </div>
          </form>
          {{-- from --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection