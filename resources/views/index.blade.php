<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5">
    	<a href="{{route('post.create')}}" class="btn btn-primary mb-2">Add Post</a>
    	<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Author name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(count($data)>0)
    	@foreach($data as $d)
    		<tr>
      <th scope="row">{{$loop->index+1}}</th>
      <td>{{$d->title}}</td>
      <td>{{$d->content}}</td>
      <td>{{$d->author_name}}</td>
      <td>
      	<a href="{{route('post.edit',$d->id)}}" class="btn btn-success btn-sm">Edit</a>
      	<a href="{{route('post.show',$d->id)}}" class="btn btn-success btn-sm">View</a>
      	<button  onclick="deletePost('{{$d->id}}')" class="btn btn-danger btn-sm">Delete</button>

      </td>
    </tr>
    	@endforeach
    @else
    <h4>No found data!</h4>
    @endif
     </tbody>
</table>
    	
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@if (session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
<script type="text/javascript">
  function deletePost(id) {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '/posts/delete/' + id;
      }
    });
  }
</script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>