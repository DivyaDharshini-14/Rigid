<form action="{{ route('replies.store') }}" method="POST" class="mt-2">
    @csrf
    <input type="hidden" name="comment_id" value="{{ $comment->id }}">

    <div class="flex items-start gap-2">
        <textarea name="body"
                  rows="2"
                  placeholder="Write a reply..."
                  class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"
                  required>{{ old('body') }}</textarea>

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-md">
            Reply
        </button>
    </div>

    @error('body')
    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror
</form>

