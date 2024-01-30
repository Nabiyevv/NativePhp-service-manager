<div>
  {{-- Search Service --}}
  <livewire:search-service />
  <!-- Service List -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($services as $service)
      <livewire:service-card
        serviceDescription="{{ $service['description'] }}" 
        serviceName="{{ $service['name'] }}"
        status="{{ $service['status'] }}"
        isFavorite="{{ $service['isFavorite'] }}"
        :key="$service['id']" />
    @endforeach
  </div>
</div>
