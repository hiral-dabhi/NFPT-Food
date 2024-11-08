<?php

namespace App\Livewire\Front;

use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $orders;
    public $selectedOrder;

    public function mount()
    {
        $user = Auth::guard('customer')->user();
        $this->orders = Orders::where('user_id', $user->id)
                              ->with('itemDetail.menuDetail', 'businessDetail')
                              ->get();
    }

    public function viewDetails($orderId)
    {
        $this->selectedOrder = $this->orders->where('id', $orderId)->first();
    }

    public function render()
    {
        return view('livewire.front.profile');
    }
}
