<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  @auth
  <div class="container">
    <div>
      <!-- <script>
    alert("Log in successfully!")
    </script> -->
      <nav class="navbar bg-body-">
        <div class="container-fluid">
          <a class="navbar-brand">IdeaLab</a>
          <form class="d-flex" action="/logout" method="POST">
            <!-- <input class="form-control" style="height: 30px" type="search" placeholder="Search" aria-label="Search"> -->
            <button class="btn btn-outline-success mx-2" type="submit">Search</button>
            @csrf
            <button class="btn btn-outline-danger">log out</button>
          </form>
        </div>
      </nav>

      <div class="container my-4 bg-primary-subtle p-3 rounded">
        <h2 class="text-secondary my-3">Have something in mind? </h2>
        <form action="/create-post" method="POST">
          @csrf
          <div class="mb-3">

            <label class="form-label">Post Title</label>
            <input class="form-control" type="text" name="title" placeholder="post title">
          </div>
          <textarea class="form-control mb-3" name="body" placeholder="body content..."></textarea>
          <button class="btn btn-success">Save Post</button>
        </form>
      </div>

      <div class="text-secondary bg-primary-subtle p-3 ">
        <h2>All Posts</h2>
        @foreach($posts as $post)
        <div class="bg-light p-4 rounded mb-3">
          <h3 class="text-secondary">{{$post["title"]}} by {{$post->user->name}}</h3>
          {{$post["body"]}}
          <div class="row align-items-center">
            <div class="col-auto">
              <a class="btn btn-warning text-white mt-4" href="/edit-post/{{$post->id}}">Edit</a>
            </div>
            <div class="col-auto align-items-center mt-4">
              <form class="d-inline" action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  @else
  <div class="container">

    <nav class="navbar bg-body-">
      <div class="container-fluid">
        <a class="navbar-brand">IdeaLab</a>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div class="container mt-5">
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button text-success" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Register A New Account
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="container ">
                <form action="/register" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input class="form-control" name="name" type="text" placeholder="name">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" name="email" type="text" placeholder="email">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" name="password" type="password" placeholder="password">
                  </div>
                  <button class="btn btn-success">Register</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed text-success" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Log in
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="container">

                <form action="/login" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input class="form-control" name="loginname" type="text" placeholder="name">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" name="loginpassword" type="password" placeholder="password">
                  </div>
                  <button class="btn btn-success">Log in</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  @endauth


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>

</html>