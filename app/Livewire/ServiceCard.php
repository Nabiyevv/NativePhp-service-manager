<?php

namespace App\Livewire;

use App\Helper\StatusNotfication;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use Livewire\Component;

class ServiceCard extends Component
{
    private ServiceController $serviceController;

    public function __construct()
    {
        $this->serviceController = new ServiceController();
    }

    public bool $status = false;

    public string $serviceName = '';

    public string $serviceDescription = '';

    public bool $isFavorite = false;

    public int $key = 0;

    public function startService(string $serviceName)
    {   
        $this->status = $this->serviceController->start($serviceName);
        StatusNotfication::send($serviceName,'start');
    }
    public function stopService(string $serviceName)
    {   
        $this->status = $this->serviceController->stop($serviceName);
        StatusNotfication::send($serviceName,'stop');
    }
    public function restartService(string $serviceName)
    {   
        $this->status = $this->serviceController->restart($serviceName);
        StatusNotfication::send($serviceName,'restart');
    }

    public function toggleFavorite(string $serviceName)
    {
        $this->isFavorite = !$this->isFavorite;
        $this->dispatch('toggleFovorite'); 
        Service::where('name',$serviceName)->update(['isFavorite' => $this->isFavorite]);
        StatusNotfication::send($serviceName,'fovorite',$this->isFavorite);
    }

    public function render()
    {
        return view('livewire.service-card');
    }
}
