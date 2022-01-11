@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">Employe</div>
    <div class="card-body">
      <a href="{{ route("employe.create") }}" class="btn btn-success">Create new employe</a>
      <table class="table table-bordered my-3">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th>Email</th>
            <th>Phone No</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($employe as $item)
          <tr>
            <td>{{ $item->firstName }}</td>
            <td>{{ $item->lastName }}</td>
            <td>{{ $item->company->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phoneNo }}</td>
            <td>
              <a href="{{ route('employe.edit', $item) }}" class="btn btn-sm btn-secondary">Edit</a>
            </td>
            <td>
              <form action="{{ route('employe.destroy', $item) }}" method="POST">
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
  </div>
</div>
@endsection