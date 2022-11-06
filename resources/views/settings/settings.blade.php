<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="lg:items-center lg:px-40 px-10 py-10">
        <div>
            <h1 class="text-2xl pb-3 font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Settings</h1>
            <p>Manage your profile settings</p>
        </div>

        <div class="max-w-xl">
            <form action="{{ route('settings.store') }}" method="post" class="mt-4">
                @csrf
                <div class="px-4 sm:px-0">
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        <div class="mt-1">
                            Name
                            <input type="text" id="name" required name="name" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ auth()->user()->name }}"></input>
                        </div>
                    </label>

                    <label for="email" class="block text-sm font-medium text-gray-700">
                        <div class="mt-1">
                            Email
                            <input type="email" id="email" required name="email" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ auth()->user()->email }}"></input>
                        </div>
                    </label>
                </div>
            
                  <div class="py-3 pl-4 sm:pl-0">
                    <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Update
                      </button>
                  </div>
            </form>
        </div>


    </div>
</x-app-layout>