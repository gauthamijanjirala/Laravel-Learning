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
        <div class="text-right">
            <a href="products/create" class="btn btn-dark mt-2"> New Project</a>
        </div>
    </div>

        <table class="table table-hover mt-4 m-5  ">
        <thead>
            <tr>
                <th>Sr.no</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr>
                <td>{{  $loop->index+1  }}</td>
                <td>{{  $product->name  }}</td>
                <td>
                <!-- <img src="{{ asset('products').'/'.$product->image }}" class="rounded-circle" width="30" height="30"/>  -->
                    <img src="products/{{ $product->image }}" class="rounded-circle" width="40" height="40"/> 
                </td>
                <td>
                    <a href="products/{{ $product->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>