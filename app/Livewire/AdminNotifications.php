<?php

namespace App\Livewire;

use Livewire\Component;

class AdminNotifications extends Component
{
    public $notifications = [];

    protected $listeners = ['customerCreated' => 'addNotification'];

    public function addNotification($customer)
    {
        $this->notifications[] = "New customer created: {$customer['name']} ({$customer['email']})";

        $this->dispatchBrowserEvent('remove-toast');
    }
    
    

    public function render()
    {
        // die;
        // $this->dispatchBrowserEvent('show-toast');
        return view('livewire.admin-notifications');
    }
}

