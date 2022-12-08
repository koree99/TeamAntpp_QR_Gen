<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>generate qr</title>
</head>
<body>
    <form action="/genqr" method="post">
        @csrf
        <label for="">select the type of qr you want to generate</label>
        <select name="qtype" id="">
            <option value="event">Event</option>
            <option value="address"> Address</option>
        </select>
<label for="">enter your addr/ticket no </label>
        <input type="text" name='data'>
<label for="">event name</label>
<input type="text" name="ename">
<label for="">event addr</label>
<input type="text" name="addr">
<label for="">event time</label>
<input type="text" name="time">
<label for="">event dress code</label>
<input type="text" name="dresscode">
        <button type="submit">submit</button>
    </form>
</body>
</html>