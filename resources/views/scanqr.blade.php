<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan qr</title>
</head>
<body>
<form action="{{url('/scanqr')}}" method="post" enctype="multipart/form-data">
    @csrf
<input type="file" name="image">
<input type="text" name="txt">
    <input type="submit" value="Submit">
</form>
</body>
</html>