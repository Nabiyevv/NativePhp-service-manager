<div class="bg-gray-800 p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4">{{ $serviceTitle }}
        <span class="font-medium text-lg">({{ $serviceName }})</span>
    </h2>
    <p class="mb-4">Status: 
        @if ($status == 1)
            <span class="font-bold text-green-500" id="isRunning">Running</span>
        @else
            <span class="font-bold text-red-500" id="isStopped">Stopped</span>
        @endif
    </p>
    <div class="flex justify-between">
        <button onclick="submitForm('{{ $serviceName }}')" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border bg-background h-10 px-4 py-2 text-green-500 border-green-500 hover:bg-green-500 hover:text-white">
            Start
        </button>

        <button onclick="stopService('{{ $serviceName }}')" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border bg-background h-10 px-4 py-2 text-red-500 border-red-500 hover:bg-red-500 hover:text-white">
            Stop
        </button>

        <button onclick="restartService('{{ $serviceName }}')" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border bg-background h-10 px-4 py-2 text-orange-500 border-orange-500 hover:bg-orange-500 hover:text-white">
            Restart
        </button>

    </div>
</div>