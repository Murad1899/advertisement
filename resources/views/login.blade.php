<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @if(session('error'))
        {{ session('error') }}
    @endif
    
    <form action ="{{ route('login.store') }}" method="POST">

        @csrf

        <input type="text" name="email" placeholder="email"> <br>
        <input type="text" name="password" placeholder="password"> <br>


        <input type="submit" value="Login">


</body>
</html>