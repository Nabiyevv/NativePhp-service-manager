<div class="relative w-full max-w-md mb-5">
    <input wire:model.live="search" type="text" placeholder="Search..."
      class="w-full px-4 py-2 border border-gray-700 bg-gray-800 rounded-md focus:outline-none focus:border-blue-500 text-white">
    <button wire:click="$refresh" type="submit"
      class="absolute inset-y-0 right-0 px-3 py-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Search</button>
  </div>