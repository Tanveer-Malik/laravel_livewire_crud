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

        // Auto remove after 5 seconds
        $this->dispatchBrowserEvent('remove-toast');
    }

    public function render()
    {
        return view('livewire.admin-notifications');
    }
}

