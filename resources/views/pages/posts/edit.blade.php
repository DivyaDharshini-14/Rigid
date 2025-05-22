<x-layouts.app :title="__('Edit Post')">
    <div class="container">
        <h2 class="text-xl font-bold mb-4">Edit Post</h2>

        @if ($errors->any())
            <ul class="text-red-500 mb-4">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block mb-2">Title</label>
            <input type="text" name="title" id="title" class="border p-2 w-full mb-4"
                   value="{{ old('title', $post->title) }}" required>

            <label class="block mb-2">Body</label>
            <textarea name="body" id="body" rows="6" class="border p-2 w-full mb-4" required>{{ old('body', $post->body) }}</textarea>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('posts.index') }}" class="ml-2 text-gray-700">Cancel</a>
        </form>
    </div>
</x-layouts.app>
