@extends('layouts.backend')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Book Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Book Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

 <!-- Main content -->
<section class="content">
    <div class="row d-flex justify-content-center">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Book</h3>
          </div>
          <form action="{{route('books.store')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" id="title" name="title" placeholder="Title" class="form-control">
              @error('title') <div><small class="text-danger">{{$message}}</small></div>  @enderror
            </div>
            <div class="form-group">
              <label for="author">Author</label>
              <input type="text" id="author" name="author" placeholder="Author" class="form-control">
              @error('author') <div><small class="text-danger">{{$message}}</small></div>  @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-sm btn-success">Save</button>
            </div>
          </div>
          </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
</section>
<!-- /.content -->


@endsection  