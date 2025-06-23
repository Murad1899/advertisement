<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action ="{{ route('register.store') }}" method="POST">

        @csrf

        <input type="text" name="email" placeholder="email"> <br>
        <input type="text" name="name" placeholder="name"> <br>
        <input type="text" name="password" placeholder="password"> <br>


        <input type="submit" value="Register">


</body>
</html>