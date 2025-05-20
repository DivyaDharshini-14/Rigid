<x-layouts.app :title="__('Manager')">

    <a href="{{ route('posts.create') }}">Create New Post</a>

    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post->id) }}">
                    <strong>{{ $post->title }}</strong> by {{ $post->user->name }}
                </a>
            </li>
        @endforeach
    </ul>

</x-layouts.app>
