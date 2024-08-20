<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    
   <div class="d-flex justify-content-between">
       <div class="col-sm-2">
        <li class="list-group-item active">Dashboard</li>
        <div class="card p-2">
            <img class="card-img-top" src="https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png"
                alt="Card image">
            <div class="card-body">
                <h4 class="card-title">John Doe</h4>
                <p class="card-text">Some example text.</p>
                <a href="#" class="btn btn-primary">See Profile</a>
            </div>
        </div>
        <ul class="list-group">
            <a href="#" class="list-group-item list-group-item-action">Second item</a>
            {{-- <a href="{{ route('logout') }}" class="list-group-item list-group-item-action btn btn-danger">Logout</a> --}}
            <a href="{{ route('logout') }}" class="d-flex float-start btn btn-danger">Logout</a>
        </ul>
    </div>

    <div class="col-sm-10 bg-dark text-light p-2">
      <h1>Hello, world!</h1>
    <h2>Wellcome To Dashboard</h2>
    </div>
   </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
