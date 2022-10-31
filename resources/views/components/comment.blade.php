@props(['comment'])

<div class="flex">
    <div class="flex-none pr-4 w-15">
        <img src="{{ Avatar::create($comment->user->name)->toBase64(); }}" alt="" width="30px" height="30px" style="border-radius: 50%">
    </div>
    <div class="mb-6">
        <div class="lg:flex lg:items-center">
                
                <div class="flex items-center text-sm text-indigo-500 pr-4 font-medium">                 
                {{ $comment->user->name }}
                </div>
                
                <div class="flex items-center text-xs text-gray-500">
                {{ $comment->created_at }}
                </div>
        
        
        </div>
        
        <div class="text-black-600" >
            {{ $comment->body }}

        </div>
    </div>
     
 </div>
