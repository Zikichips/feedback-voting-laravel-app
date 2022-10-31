<x-app-layout>
    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between  lg:px-40 px-10 py-10">
            <div class="min-w-0 flex-1">
              <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">{{ $feedback->title }}</h2>
              <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                
                <div class="mt-2 flex items-center text-sm text-gray-500">
                  <!-- Heroicon name: mini/map-pin -->
                  <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                  </svg>                  
                  By {{ $feedback->user->name }}
                </div>
                
                <div class="mt-2 flex items-center text-sm text-gray-500">
                  <!-- Heroicon name: mini/calendar -->
                  <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                  </svg>
                  {{ $feedback->created_at->diffForHumans() }}
                </div>
                @if ($feedback->created_at < $feedback->updated_at)
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        Edited
                    </div>
                @endif

              </div>
            </div>


         @if (auth()->user()->id === $feedback->user_id)
            
                
            <div class="mt-5 flex lg:mt-0 lg:xs-4">
              <span class=" pr-4">
                <a href="{{ route('feedback.edit', $feedback) }}">
                    <button type="button" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                      <!-- Heroicon name: mini/pencil -->
                      <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                      </svg>
                      Edit
                    </button>
                </a>
              </span>
              
          
              <form action="{{ route('feedback.destroy', $feedback) }}" method="post">
                @csrf
                @method('delete')

                  <span class="sm:ml-3">
                    <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                      <!-- Heroicon name: mini/check -->
                      
                      <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>
                      
                      Delete
                    </button>
                  </span>
              </form>
            </div>

            @endif

        </div>
        <div class="lg:px-40 px-10 pb-4 text-indigo-600" >
          Description
        </div>
        <div>
            <p class="text-lg  text-gray-900  sm:text-lg lg:px-40 px-10 ">
                {{ $feedback->description }}
            </p>
        </div>

        <div class="lg:px-40 px-10 pb-4 mt-8 text-indigo-600" >
          Discussion
        </div>
        
        <!-- Comment list -->

        <div class="lg:px-40 px-10 pb-4 max-w-5xl">

            <div>
              @foreach ($comments as $comment)
                <x-comment :comment="$comment" />
              @endforeach
            </div>
    
            <!-- Comment form -->
            <div class="pt-8">
              <x-comment-form :feedback="$feedback" />
            </div>
        </div>

      </div>

          

          
          
</x-app-layout>