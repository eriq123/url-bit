<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @if (isset($site))
        <p>{{ $site->full_path }}</p>
        <a href="{{ $site->new_path }}">http://localhost:8000/{{ $site->new_path }}</a>
    @else
        <form action="/shorten" method="POST">
            @csrf
            <input type="text" name='url'>
            <button>
                submit
            </button>
        </form>
    @endif
</body>

</html>
