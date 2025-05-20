<form action="{{ url('/comments/' . $comment->id . '/replies') }}" method="POST">
    @csrf
    <textarea name="body" placeholder="Reply to comment..." required></textarea><br>
    <button type="submit">Reply</button>
</form>
