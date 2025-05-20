<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <label>Title</label><br>
    <input type="text" name="title" required><br><br>

    <label>Body</label><br>
    <textarea name="body" required></textarea><br><br>

    <button type="submit">Submit</button>
</form>
