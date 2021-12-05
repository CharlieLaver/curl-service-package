<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('test')}}" method="post">
        @csrf
        <input type="text" name="endpoint" placeholder="API Endpoint">
        <input type="submit" value="Submit">
    </form>
</body>
</html>