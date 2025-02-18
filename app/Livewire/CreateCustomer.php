<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;
use App\Events\CustomerCreated;


class CreateCustomer extends Component
{
    // public $name = '';
    // public $email = '';
    // public $phone = '';

    public $name, $email, $phone;

    public function render()
    {
        return view('livewire.create-customer');
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers|max:255',
            'phone' => 'required|unique:customers|max:20'
        ]);

        $customer = Customer::create($validated);

        // Fire event
        event(new CustomerCreated($customer));

        session()->flash('success', 'Customer created successfully!');
        return redirect()->to('/customers');
    }

    // public function save(){
    //     $validated = $this->validate([
    //         'name' => 'required|max:255',
    //         'email' => 'required|email|unique:customers|max:255',
    //         'phone' => 'required|unique:customers|max:255'
    //     ]);
    //     Customer::create($validated);
    //     session()->flash('success','Customer Created Successfully');
    //     return $this->redirect('/customers',navigate:true);
    // }
}
