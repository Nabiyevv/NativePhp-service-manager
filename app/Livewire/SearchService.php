<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Modelable;
use App\Http\Controllers\ServiceController;

class SearchService extends Component
{
    public $search = '';

    private ServiceController $serviceController;

    public function __construct()
    {
        $this->serviceController = new ServiceController();
    }

    public function updated()
    {
        $services = $this->serviceController->searchService($this->search);
        $this->dispatch('searchService',$services); 
    }

    public function render()
    {
        return view('livewire.search-service');
    }
}
