
@foreach($posts as $post)
    <h1>{{$post->tittle}}</h1>
    <h3>ID: {{$post->id}}</h3>
    <p>{{$post->text}}</p>
    <a href="/post/{{$post->id}}">Pogledaj post</a>
@endforeach
