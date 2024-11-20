@extends('layouts.backend')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Rating Comment</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Rating Comment</li>
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
        <h3 class="card-title">Rating Comment</h3>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th>Book</th>
                    <th>User Name</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ratingComments as $ratingComments)
                    <tr>
                        <td>
                          {{$ratingComments->book['title']}} <br>
                          <small>-by : {{$ratingComments->book['author']}}</small>
                        </td>
                        <td>
                          {{$ratingComments->user['name']}} <br>
                          (<small>{{$ratingComments->user['type']}}</small>)
                        </td>
                        <td>{{$ratingComments->rating}}</td>
                        <td>{{$ratingComments->comment}}</td>
                        <td class="project-actions">
                            <form action="{{ route('rating-comment.destroy', $ratingComments->id) }}" method="POST" style="display:inline;">
                              @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Rating Comments?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

  @endsection
