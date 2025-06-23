<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('product.store') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Product name"> <br> <br>
        <input type="text" name="description" placeholder="Product description"> <br> <br>


        <select name="color_id[]" multiple>
            @foreach($colors as $color)
            <option value="{{ $color->id }}">{{ $color->name }}</option>
            @endforeach

        </select>
        <br> <br>
        <input type="submit" value="Create">
</body>
</html>