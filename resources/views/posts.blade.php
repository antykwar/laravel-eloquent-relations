<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <table>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ optional($post->user)->name }}</td>
                    <td>
                        <ul>
                            @foreach($post->tags as $tag)
                                <li>{{ $tag->name }}</li>
                                <li>{{ $tag->pivot->created_at }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
