<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fa Fa icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- custom css --}}
    <link rel="stylesheet" href="{{asset('layouts/frontend/css/style.css')}}">

    <title>Books</title>
  </head>
  <body>
    <div class="container my-5">

        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        @if(session('faild'))
            <div class="alert alert-danger" role="alert">{{ session('faild') }}</div>
        @endif

        <div class="mb-4 d-flex justify-content-between">
              <h4>Welcome to
                @if (auth()->user())
                  {{auth()->user()->name}}
                @else
                  Null
                @endif
              </h4>

              <!-- Search Box -->
              <form action="{{ route('booksFilter') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by title or author" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
              </form>
        </div>

        <div class="row">
          @foreach ($books as $book)
          <div class="col-4">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-0"><i class="fa fa-book"></i> {{$book->title}}</h5>
                  <small class="card-text text-muted">-by {{$book->author}}</small>

                  <form action="{{route('rating-comment.store')}}" method="post">
                    @csrf
                    <div class="row mt-3">
                      <input type="text" class="form-control d-none" name="book_id" value="{{$book->id}}">

                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="d-flex justify-content-between comment-rating-like mb-2">
                            <p class="p_class">
                              <input id="radio1{{$book->id}}" type="radio" name="rating{{$book->id}}" value="5">
                              <label for="radio1{{$book->id}}"><i class="fa fa-star"></i></label>
                              <input id="radio2{{$book->id}}" type="radio" name="rating{{$book->id}}" value="4">
                              <label for="radio2{{$book->id}}"><i class="fa fa-star"></i></label>
                              <input id="radio3{{$book->id}}" type="radio" name="rating{{$book->id}}" value="3">
                              <label for="radio3{{$book->id}}"><i class="fa fa-star"></i></label>
                              <input id="radio4{{$book->id}}" type="radio" name="rating{{$book->id}}" value="2">
                              <label for="radio4{{$book->id}}"><i class="fa fa-star"></i></label>
                              <input id="radio5{{$book->id}}" type="radio" name="rating{{$book->id}}" value="1">
                              <label for="radio5{{$book->id}}"><i class="fa fa-star"></i></label>
                            </p>
                        </div>
                        @error('rating'.$book->id) <div><small class="text-danger">{{$message}}</small></div>  @enderror
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                        <input type="text" class="form-control" name="comment{{$book->id}}" placeholder="Comment.." aria-describedby="emailHelp">
                        @error('comment'.$book->id) <div><small class="text-danger">{{$message}}</small></div>  @enderror
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-end">
                          <button type="submit" class="btn btn-sm btn-primary">Submit</i></button>
                      </div>
                    </div>
                  </form>

                </div>
            </div>
          </div>
          @endforeach
        </div>

        <div class="mt-4">
          {{ $books->links() }}
        </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
