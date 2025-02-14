<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // public $customers = [];
    public $search = '';

    // public function mount(){
    //     $this->customers=Customer::all();
    // }
    public function render()
    {
        if(! $this->search){
            $customers=Customer::paginate(10);
        }else{
            $customers=Customer::where('name','like','%'.$this->search.'%')->paginate(10);
        }
        return view('livewire.customers',['customers' => $customers,]);
    }
    public function deleteCustomer(Customer $customer){
        $customer->delete();
        session()->flash('success','Customer Deleted Successfully');
        return $this->redirect('/customers',navigate:true);
    }
}
