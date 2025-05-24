<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Title</label><br>
    <input type="text" name="title" required><br><br>

    <label>Body</label><br>
    <textarea name="body" required></textarea><br><br>

    <label class="block mb-2">Image</label>
    <input type="file" name="image" accept="image/*,jpg,jpeg" class="border p-2 w-full mb-4"><br>

    <label class="block mb-2">File</label>
    <input type="file" name="file" accept=".pdf,.doc,.docx,.txt" class="border p-2 w-full mb-4"><br>

    <button type="submit">Submit</button>
</form>
