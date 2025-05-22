<x-layouts.app :title="$post->title">

    <!-- Post Content -->
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6 mb-10">
        <h2 class="text-2xl font-bold mb-2 text-center">{{ $post->title }}</h2>
        <p class="text-gray-800 mb-4">{{ $post->body }}</p>
        <p class="text-sm text-gray-500 text-right">By {{ $post->user->name }}</p>
    </div>

    <!-- Comments Section -->
    <div class="max-w-2xl mx-auto">
        <h3 class="text-xl font-semibold mb-4">Comments</h3>

        @foreach ($post->comments as $comment)
            <div class="bg-gray-100 p-4 rounded-lg mb-4 relative group">
                <p class="text-gray-800">{{ $comment->body }}</p>
                <p class="text-sm text-gray-500 mt-1">– <strong>{{ $comment->user->name }}</strong></p>

                <!-- Replies: hidden by default, visible on hover -->
                <div class="ml-4 mt-3 space-y-2 hidden group-hover:block">
                    @foreach ($comment->replies as $reply)
                        <div class="bg-gray-50 p-2 rounded text-sm text-gray-700">
                            ↳ {{ $reply->body }} – <i>{{ $reply->user->name }}</i>
                        </div>
                    @endforeach

                    <!-- Reply form -->
                    @include('replies._form', ['comment' => $comment])
                </div>
            </div>
        @endforeach

        <!-- Comment form -->
        @include('comments._form', ['post' => $post])
    </div>

</x-layouts.app>
