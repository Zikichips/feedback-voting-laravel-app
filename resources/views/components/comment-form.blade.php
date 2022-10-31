<form action="{{ route('comment.store', ['feedback' => $feedback]) }}" method="post" class="mt-4">
    @csrf
    <div class="px-4 sm:px-0">
        <label for="description" class="block text-sm font-medium text-gray-700">
            <div class="mt-1">
                <textarea id="body" required name="body" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Write a comment..."></textarea>
            </div>
        </label>
    </div>
    <div>
        <input type="hidden" name="feedback_id" value="{{ $feedback->id }}"></input>
    </div>

      <div class="py-3 pl-4 sm:pl-0">
        <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Submit
          </button>
      </div>
</form>