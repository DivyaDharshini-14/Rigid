<h2>{{ $post->title }}</h2>
<p>{{ $post->body }}</p>
<p><small>By {{ $post->user->name }}</small></p>

<hr>
<h3>Comments</h3>
@foreach ($post->comments as $comment)
    <div style="margin-bottom: 20px;">
        <p>{{ $comment->body }} - <strong>{{ $comment->user->name }}</strong></p>

        <div style="margin-left: 20px;">
            @foreach ($comment->replies as $reply)
                <p>↳ {{ $reply->body }} - <i>{{ $reply->user->name }}</i></p>
            @endforeach

            @include('replies._form', ['comment' => $comment])
        </div>
    </div>
@endforeach

@include('comments._form', ['post' => $post])
