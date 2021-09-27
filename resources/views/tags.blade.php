<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <table>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <ul>
                            @foreach($tag->posts as $post)
                                <li>{{ $post->title }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
