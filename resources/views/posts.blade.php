<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clean Blog - Posts</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Main Content-->
        <main class="mb-4 mt-5">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                        <h2>Post list</h2>
                        <div class="my-5">
                            @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('success')}}
                            </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col" colspan="2">Content</th>
                                        <th scope="col" colspan="2">Image</th>
                                        <th scope="col" colspan="2">Category</th></th>
                                        <th scope="col" colspan="2">Action</th></th>
                                        <th scope="col">
                                            <a class="btn btn-primary" href="{{url('create')}}">New Post</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                      $i = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $item->title }}</td>
                                            <td colspan="2">{{ $item->content }}</td>
                                            <td colspan="2"><img alt="" width="200px" src="images/{{$item->image}}"></td>
                                            <td >{{ $item->category }}</td>
                                            <td colspan="2">
                                                <a class="btn btn-primary" href="{{url('edit/'.$item->id)}}">Edit</a>
                                                <a class="btn btn-danger" href="{{url('delete/'.$item->id)}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- <img src='images/20230330154354.jpeg'> --}}
                            </table>
                        </div>
                </div>
            </div>
        </main>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
