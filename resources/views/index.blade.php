<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <table>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->address->country }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
