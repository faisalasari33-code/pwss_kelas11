<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <h1> HOME </h1>
     <p>{{ $nama }} ({{ $role }})</p>
     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias ratione commodi delectus nobis vitae porro.</p>
       <ul>
        @foreach ( $products as $key => $item);
        <li>{{ $item }}</li>
        @endforeach
    </ul>
</body>
</html>
