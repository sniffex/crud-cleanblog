<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create a New Post</title>
    <!-- Link to Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Create a New Post</h1>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <form method="POST" action="{{url('store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" >
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <input type="text" class="form-control" name="content" >
        </div>
        <div class="form-group">
            <label for="imageFile">Image:</label>
            <input type="file" class="form-control-file" name="image" accept="image/*" >
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" name="category">
                <option value="">Select a category</option>
                <option value="Category1">Category 1</option>
                <option value="Category2">Category 2</option>
                <option value="Category3">Category 3</option>
            </select>
        </div>
        <button type="submit"  class="btn btn-primary">Create Post</button>
        <a href="{{url('posts')}}" class="btn btn-danger">Back</a>
    </form>
</div>
<!-- Link to Bootstrap and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
