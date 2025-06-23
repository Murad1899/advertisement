<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h1>
        {{'Salam'}}
    </h1>


    @php
    print_r($categories);
    @endphp

    <br>

    <h2>
        {{'CheckTemplate'}}
    </h2>

    @if(1==1)
        <h2>
            {{'True'}}
        </h2>
    @else
        <h2>
            {{'False'}}
        </h2>
    @endif

    @foreach($categories as $category)
        {{$loop->index}}
        {{$category}}
    @endforeach
    <br>
    @for($i = 0;$i < 3;$i++)
        {{'1'}}
        <br>
    @endfor

</body>
</html>



