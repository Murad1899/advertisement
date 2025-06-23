<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h1>
    Category Edit
</h1>


<a class="btn btn-sm btn-success" href="{{route('category.index')}}">Shared</a>

@if(session('success'))
    {{session('success')}}
@else
    {{'1'}}
@endif

<!-- /resources/views/post/create.blade.php -->


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Post duzeltmek -->

<form action="{{ route('category.update' , $category->id) }}" method="post">
    @csrf
    <input type="text" name="name" value="{{$category->name}}" placeholder="category name">
    <input type="text" name="description" value="{{$category->description}}" placeholder="description">

    <button type="submit">Update</button>
</form>

</body>
</html>

