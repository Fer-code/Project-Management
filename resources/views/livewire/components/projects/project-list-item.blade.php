<div
class="w-full md:w-auto cursor-pointer flex gap-4 items-center items-justify px-4 py-8 bg-white border-gray-200 border-2 rounded-xl shadow-md"

>
    
    <div class="description relative p-4 rounded-xl">

        <div class="col-span-1 flex items-end items-justify gap-2 justify-end mr-6 mt-2 absolute right-0">

            
        </div>

        <p class="mt-1 text-left text-sm font-medium uppercase text-gray-500 dark:text-neutral-500">
            #{{$project['id']}}
        </p>

        <h3 class="text-lg text-left font-bold text-gray-800 dark:text-white">
            {{$project['name']}}
        </h3>

        <h5 class="text-lg text-left text-gray-800 dark:text-white">
            {{$project['description']}}
        </h5>

        <div class="flex items-center mt-2 font-light text-gray-500 dark:text-neutral-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar"
                viewBox="0 0 16 16">
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
            </svg>

            <p class="ml-2 text-sm">{{$project['created_at']}}</p>

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye ml-5"
                viewBox="0 0 16 16">
                <path
                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
            </svg>

        </div>

        <div class="mt-3">

        

            @php
            $status = $project['status'];
            $colors = [
            'default' => 'bg-blue-100 text-blue-800',
            'concluded' => 'bg-green-100 text-green-800',
            'pending' => 'bg-red-100 text-red-800',
            'archived' => 'bg-purple-100 text-purple-800',
            'deleted' => 'bg-stone-900 text-stone-100'
            ];
            $colorClass = $colors[$status] ?? $colors['default'];
            @endphp

            <span
                class="ml-1 py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium {{ $colorClass }} rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                    class="bi bi-chat-left" viewBox="0 0 16 16">
                    <path
                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                </svg>
                {{$project['status']}}
            </span>

            @if($project['status'] == 'deleted')
            @if($itemPermanentlyDeleted)
            <p class="text-red-500 mt-2 text-sm">Este item foi excluído permanentemente.</p>
            @else
            <p class="text-red-500 mt-2 text-sm">
                {!! __('Este item será excluído permanentemente em <strong>:days dias</strong>.', ['days' =>
                $deletionCountdown['days']]) !!}
            </p>
            @endif
            @endif
        </div>
    </div>

</div>