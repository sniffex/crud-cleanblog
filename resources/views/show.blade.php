<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Post</title>
    <!-- Link to Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">View Post</h1>
        <div class="card p-4">
            <h2>Title:</h2>
            <p>{{$product->title}}</p>
            <h2>Content:</h2>
            <p>{{$product->content}}</p>
            <h2>Image:</h2>
            <img src="/images/{{$product->image}}" class="img-fluid rounded">
            <h2>Category:</h2>
            <p>{{$product->category->name}}</p>
            <a href="{{url('/')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
</body>
</html>
