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
                        <h3>Create a new Company</h3>
                    </div>
                    <div class="card-body">
                        {{-- form --}}
                        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                </div>
                                <div class="col-6 mb-3">
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control mb-3" placeholder="Address" name="address">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Website" name="website">
                                </div>
                                <div class="col-12 form-group mt-3">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="imagePath" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
