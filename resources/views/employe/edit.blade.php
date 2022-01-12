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
          <h3>Edit a new Employe</h3>
        </div>
        <div class="card-body">
          {{-- form --}}
          <form action="{{ route('employe.update', $employe->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
              <div class="col-6 mb-3">
                <input type="text" class="form-control" placeholder="firstName" name="firstName" value="{{ $employe->firstName }}">
              </div>
              <div class="col-6 mb-3">
                <input type="text" class="form-control" placeholder="lastName" name="lastName" value="{{ $employe->lastName }}">
              </div>
              <div class="col-12">
                <input type="text" class="form-control mb-3" placeholder="phoneNo" name="phoneNo"
                  value="{{ $employe->phoneNo }}">
              </div>
              <div class="col-12">
                <input type="email" class="form-control" placeholder="email" name="email"
                  value="{{ $employe->email }}">
              </div>
              <div class="col-12 mt-3">
                <select name="company_id" class="form-control">
                  <option value="{{$employe->company->id}}">{{$employe->company->name}}</option>
                    @foreach ($companies as $campany)
                    @if ($employe->company->id === $campany->id)
                    @else
                    <option value="{{$campany->id}}">{{$campany->name}}</option>
                    @endif
                    @endforeach
                </select>
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


