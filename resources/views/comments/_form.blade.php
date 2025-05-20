<form action="{{ url('/posts/' . $post->id . '/comments') }}" method="POST">
    @csrf
    <textarea name="body" placeholder="Add a comment..." required></textarea><br>
    <button type="submit">Comment</button>
</form>
