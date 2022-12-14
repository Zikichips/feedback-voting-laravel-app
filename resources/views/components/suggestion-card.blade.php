@props(['comment', 'feedback', 'vote'])
<div class="px-4">
    
    {{-- Check if the user has voted on this feedback already and route to the appropriate controller method --}}
    <?php 
        $count = 0;
      
    ?>
    @foreach ($vote as $vote_singular)
        @if ($vote_singular->user_id == auth()->id())
            <?php 
                $count = $count + 1;
                $vote_to_delete = $vote_singular;
             ?>
        @endif

    @endforeach

    @if ($count === 0)
        <form action="{{ route('votes.store') }}" method="post">
            @csrf
        <input type="hidden" name="feedback_id" value="{{ $feedback->id }}"></input>
       
    @else
        <form action="{{ route('votes.destroy', $vote_to_delete) }}" method="post">
            @csrf
            @method('delete')
    @endif
    
            <button type="submit">
    
                <div>
                     <svg  class="mr-1.5 h-5 w-5 flex-shrink-0 text-black-400"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm.53 5.47a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72v5.69a.75.75 0 001.5 0v-5.69l1.72 1.72a.75.75 0 101.06-1.06l-3-3z" clip-rule="evenodd" />
                      </svg>
                </div>
    
                <div class="pr-1">
                    {{ $vote->count() }}
                </div>  
            </button>
            </form> 
    

 <!-- Comment count -->

</div>
<div class="px-4 sm:px-0">
    <div class="flex justify-between">
        <div>
            <h3 class="text-lg font-bold leading-6 text-black-black ">
                <a href="{{ route('feedback.show', $feedback) }}">
                    {{ $feedback->title }}
                </a>
            </h3>
        </div>

        @if ($comment > 0)
        <div>
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: comment-count -->
                <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                  </svg>
                {{ $comment }}
              </div>
        </div>
        @endif

        
    </div>
    <p class="mt-1 text-sm text-gray-600">{{ $feedback->description }}</p>
</div>