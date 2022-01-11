@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">Companies</div>
    <div class="card-body">
      <a href="{{ route('company.create') }}" class="btn btn-success">Create new company</a>
      <table class="table table-bordered my-3">
        <thead>
          <tr>
            <th>Id</th>
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Website</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($company as $item)
          {{-- {{ dd(storage_path('public/'. $item->imagePath)) }} --}}
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
      {!! $company->links() !!}
    </div>
  </div>
</div>
@endsection