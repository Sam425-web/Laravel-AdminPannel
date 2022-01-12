@extends('adminlte::page')

@section('title', 'Company')

@section('content_header')
<a href="{{ route('company.create') }}" class="btn btn-success btn-sm mr-3 ">Create new company</a>
@stop

@section('content')

<div class="container">
  <div class="card">
    <div class="card-header">
        <h3 class="card-title">Company Table</h3>
      
        <div class="card-tools">
          {!! $company->links() !!}
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Image</th>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Website</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($company as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td><img src="{{ asset('images/'. $item->imagePath) }}" alt=""></td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->address }}</td>
              <td>{{ $item->website }}</td>
              <td>
                <a href="{{ route('company.edit', $item->id) }}" class="btn btn-sm btn-secondary">Edit</a>
              </td>
              <td>
                <form action="{{ route('company.destroy', $item->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
   
  </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  console.log('Hi!'); 
</script>
@stop
