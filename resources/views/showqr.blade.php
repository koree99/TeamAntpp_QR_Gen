<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  @if(isset($status)){
    <h1>{!! $status->msg !!}</h1>
  }
  @endif
@foreach ($data as $qrcodes)
<div>{!!$qrcodes->id!!}</div><br>
<p>Qr Title</p>
<div>{!!base64_decode($qrcodes->qrcodes)!!}</div><br><form action="{{url('/deleteqr/'.$qrcodes->id)}}" method="post"> @csrf <input type="submit" value="Delete Qr"> </form>
@endforeach

</body>
</html>