<h1>Hello Published Posts!</h1>

@foreach ($posts as $post)
    <h2>{{$post->title}}</h2>
    <small>{{$post->author}}</small>
@endforeach
