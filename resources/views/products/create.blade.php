<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark">
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" href="/">Products</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row justify-content-center  pt-5">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <form method="POST" action="/products/store" entype="multipart/ form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="4" name="description"></textarea>
                        </div>
                        <div clas="form-group">
                            <label> Image </label>
                            <input type="file" name="image" clas="form-control"/>
                        </div>
                        <button type="submit" class="btn btn-dark mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
