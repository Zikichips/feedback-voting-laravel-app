<x-app-layout>
    <x-slot name="header">
        <div class="max-w-full px-10 lg:px-40">
        {{-- <div class="flex flex-row"> --}}
            <div>
                <form action="{{ route('feedback.update', $feedback) }}" method="post" class="mt-4">
                    @csrf
                    @method('patch')
                    <div class="px-4 sm:px-0">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            <div class="mt-1">
                                <input type="text" id="title" required name="title" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Title" value="{{$feedback->title}}"></input>
                            </div>
                        </label>
                
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            <div class="mt-1">
                                <textarea type= id="description"  required name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $feedback->description }}</textarea>
                            </div>
                        </label>
                    </div>
                
                      <div class="py-3 pl-4 sm:pl-0 ">
                        <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Update
                          </button>
                      </div>
                </form>
            </div>

        {{-- </div> --}}
        </div>
</x-app-layout>