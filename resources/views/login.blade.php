<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    <ul>
        <li>{{ $LoginData }}</li>
        @foreach ($LoginData as $item)
            <li>{{ $item -> LogFirstName }} {{ $item -> LogLastName }}</li>
        @endforeach
    </ul>
</body>
</html>
