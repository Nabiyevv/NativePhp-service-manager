<div class="bg-gray-800 p-6 rounded-lg shadow-md">
    <div class="flex justify-between">
        <div>
            <h2 class="text-xl font-bold mb-4">{{ substr($serviceDescription, 0,25) . (strlen($serviceDescription) > 25 ? '...' : '') }}
                <span class="font-medium text-lg">({{ $serviceName }})</span>
            </h2>
        </div>
        <div>
                @if ($isFavorite)
                <button wire:click="toggleFavorite('{{ $serviceName }}')" class="flex justify-center items-center w-8 h-8 text-yellow-100 transition border border-yellow-500 rounded-full ripple hover:bg-yellow-200 focus:outline-none waves-effect">
                    <svg class="w-5 h-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </button>
                @else
                <button wire:click="toggleFavorite('{{ $serviceName }}')" class="flex justify-center items-center w-8 h-8 text-white transition border border-black-500 rounded-full ripple hover:bg-gray-600 focus:outline-none waves-effect">
                    <svg class="w-5 h-5 text-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </button>
                @endif
            
        </div>
          
    </div>
    <p class="mb-4" id="{{ $serviceName }}">Status: 
        @if ($status == 1) 
            <span class="font-bold text-green-500" id="isRunning">Running</span>
        @else
            <span class="font-bold text-red-500" id="isStopped">Stopped</span>
        @endif
    </p>
    <div class="flex justify-between"> 
        <button wire:click="startService('{{ $serviceName }}')" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border bg-background h-10 px-4 py-2 text-green-500 border-green-500 hover:bg-green-500 hover:text-white">
            Start
        </button>
 
        <button wire:click="stopService('{{ $serviceName }}')" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border bg-background h-10 px-4 py-2 text-red-500 border-red-500 hover:bg-red-500 hover:text-white">
            Stop
        </button>

        <button wire:click="restartService('{{ $serviceName }}')" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border bg-background h-10 px-4 py-2 text-orange-500 border-orange-500 hover:bg-orange-500 hover:text-white">
            Restart
        </button>

    </div>
</div>