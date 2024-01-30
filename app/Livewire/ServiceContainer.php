<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Http\Controllers\ServiceController;

class ServiceContainer extends Component
{


    private ServiceController $serviceController;

    public function __construct()
    {
        $this->serviceController = new ServiceController();
    }
    
    public $search = '';
    private $services;

    #[On('toggleFovorite')]
    public function mount()
    {
        $this->services = $this->serviceController->searchService($this->search);
    }

    #[On('searchService')]
    public function searchService($searchResult)
    {
        $this->services = $searchResult;
    }

    public function render()
    {
        return view('livewire.service-container',[
            'services' => $this->services,
        ]);
    }
}
