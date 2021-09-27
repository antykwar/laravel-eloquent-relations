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
                    <td style="background-color: lawngreen">{{ $user->address->country }}</td>
                    @if($user->posts->isNotEmpty())
                        <td>
                            <table style="background-color: darkgray">
                                @foreach($user->posts as $post)
                                <tr>
                                    <td>
                                        {{ $post->title }}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
    </body>
</html>
