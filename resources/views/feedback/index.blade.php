<x-app-layout>
    <x-slot name="header">
        <div class="lg:px-40 px-10 pt-12">
        <div class="lg:flex flex-row">
            <div class="flex-initial">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Leave a Suggestion</h3>
                    <p class="mt-1 text-sm text-gray-600">We'd love to hear what you're thinking about.<br>
                        What can we do better? This is the place for you to vote, discuss and share ideas.</p>
                </div>

                <x-suggestion-form />
            </div>


            <div class="lg:ml-20">
                @foreach ($feedbacks as $feedback)

                    @php
                        $comment = $comments->where('feedback_id', $feedback->id)->count();
                    @endphp

                    <div class="flex flex-row mb-6">
                            <x-suggestion-card :comment="$comment" :feedback="$feedback" />
                    </div>
                @endforeach

            </div>

        </div>
        </div>
</x-app-layout>