@extends('adminlte::page')

@section('content_header')
<br>
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if ($errors->any())
      <div>
        @foreach ($errors->all() as $error)
        <p class="alert alert-danger" role="alert">{{ $error }}</p>
        @endforeach
      </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h3>Edit a new Company</h3>
        </div>
        <div class="card-body">
          {{-- form --}}
          <form action="{{ route('company.update', $company->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
              <div class="col-6 mb-3">
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $company->name }}">
              </div>
              <div class="col-6 mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $company->email }}">
              </div>
              <div class="col-12">
                <input type="text" class="form-control mb-3" placeholder="Address" name="address" value="{{ $company->address }}">
              </div>
              <div class="col-12">
                <input type="text" class="form-control" placeholder="Website" name="website" value="{{ $company->website }}">
              </div>
            </div>
            <div class="col-12 mt-3">
              <button type="submit" class="btn btn-primary float-end">Update</button>
            </div>
          </form>
          {{-- from --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection