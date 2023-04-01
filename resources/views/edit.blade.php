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
    <h1>EditPost</h1>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <form method="POST" action="{{url('update/'.$data->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="{{$data->title}}" >
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <input type="text" class="form-control" name="content" value="{{$data->content}}">
        </div>
        <div class="form-group">
            <label for="imageFile">Image:</label>
            <input type="file" class="form-control-file" name="image" accept="image/*" value="{{$data->image}}">
            <h3>Current Image</h3>
            <img src="/images/{{$data->image}}" width="300" height="300">
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Choose a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $data->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit"  class="btn btn-primary">Update Post</button>
        <a href="{{url('/')}}" class="btn btn-danger">Back</a>
    </form>
</div>
<!-- Link to Bootstrap and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
