<?php

namespace App\Livewire\Front;

use App\Models\Category;
use App\Models\RestaurantMaster;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $restaurants;
    public $category;
    public function mount()
    {
        $address = session('address');
    
        $this->restaurants =  RestaurantMaster::take('4')->get();
        $this->category = Category::with('items')->get();
    }
    public function render()
    {
        return view('livewire.front.home');
    }
}
