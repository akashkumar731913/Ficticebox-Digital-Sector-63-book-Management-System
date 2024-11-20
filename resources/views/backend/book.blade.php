@extends('layouts.backend')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Book</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Books</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    @if(session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Books</h3>

        <div class="card-tools">
          <a href="{{route('bookAdd')}}" class="btn btn-sm btn-primary">Add Book</a>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td class="project-actions">
                            <a class="btn btn-info btn-sm" href="{{ route('books.edit', $book->id) }}"><i class="fas fa-pencil-alt mr-1"></i>Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                              @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Book?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
          {{ $books->links() }}
        </div>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

  @endsection
