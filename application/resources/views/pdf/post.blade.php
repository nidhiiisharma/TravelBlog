<!DOCTYPE html>
<html>
<head>
    <style>
    .page-break {
    page-break-after: always;
    }
    </style>
    <title>PDF</title>
</head>
<body>
    @foreach($posts as $key => $post)
    <div class="page-break"> 
        <h1>{{$post->title}}</h1>
        <div>
            {{$post->moreBody}}
        </div>
        <hr>
        <small>Written on {{$post->created_at}} by {{$post->user['name']}}</small>
        <hr>
    </div>
    @endforeach
</body>
</html>