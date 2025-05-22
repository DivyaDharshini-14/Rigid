<x-layouts.app :title="__('Posts')">

    <div class="mb-4">
        <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Create New Post
        </a>
    </div>

    @if (session('success'))
        <div class="text-green-600 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            <div class="bg-white shadow-md rounded-xl p-6 flex flex-col justify-between h-full">
                <div>
                    <a href="{{ route('posts.show', $post->id) }}">
                    <h2 class="text-xl font-bold mb-2 line-clamp-2">{{ $post->title }}</h2></a>

                    <p class="text-gray-700 line-clamp-3 mb-4">
                        {{ \Illuminate\Support\Str::limit($post->body, 200) }}
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">...</a>
                    </p>
                </div>

                <div class="flex justify-between items-center mt-auto pt-4 border-t border-gray-200">
                    <!-- User Avatar or Initial -->
                    <div class="flex items-center text-sm text-gray-500">
                        @if ($post->user->profile_photo_url)
                            <img src="{{ $post->user->profile_photo_url }}"
                                 alt="{{ $post->user->name }}"
                                 class="w-6 h-6 rounded-full mr-2 object-cover">
                        @else
                            <div class="w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center mr-2 text-xs font-semibold text-gray-700 uppercase">
                                {{ strtoupper(substr($post->user->name, 0, 1)) }}
                            </div>
                        @endif
                        {{ $post->user->name }}
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2">
                        <a href="{{ route('posts.edit', $post->id) }}"
                           class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded text-sm">
                            Edit
                        </a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-layouts.app>
