@extends('adminlte::page')

@section('title', 'Employe')

@section('content_header')
<a href="{{ route("employe.create") }}" class="btn btn-sm btn-success">Create new employe</a>
@stop

@section('content')
<div class="container">
  <div class="card">
  <div class="card-header">
        <h3 class="card-title">Employe Table</h3>
      
        <div class="card-tools">
          {{-- {!! $employe->links() !!} --}}
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>FirstName</th>
              <th>LastName</th>
              <th>Company</th>
              <th>Email</th>
              <th>PhoneNo</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($employe as $item)
          <tr>
            <td>{{ $item->id }}</td>
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


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  console.log('Hi!'); 
</script>
@stop