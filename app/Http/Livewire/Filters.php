<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\ProductCategory;

class Filters extends Component
{
    public $categories;
    public function render()
    {
        $this -> categories = ProductCategory::get();

        return view('livewire.filters');
    }
}
