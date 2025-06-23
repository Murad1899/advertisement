<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <a href="{{ route('logout') }}">Logout</a>
  <h2>Products {{ auth()->user()->name }}</h2>
            
  <table class="table">
    <thead>
      <tr>
        <td>Product name</td>
        <td>Product description</td>
        <td>Product colors</td>
      </tr>
    </thead>
    <tbody>
        <!-- @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td> @php print_r($product->colors1->toArray()) @endphp</td>
            </tr>
        @endforeach -->

        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    @foreach($product0>colors1 as $color)
                        {{ $color->color . ' '}}
                    @endforeach
                </td>
            </tr>   
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
