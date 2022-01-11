@extends('layouts.app')

@section('content')
 <div class="container">
   <div class="row justify-content-center">
     <div class="col-md-8">
       <div class="card">
         <div class="card-header"><h3>Create a new Company</h3></div>
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
                <div class="col-12 mt-3">
                  <input type="file" name="imagePath" class="form-control">
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