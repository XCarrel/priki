<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Practice extends Component
{
    public $practice;
    public $showDomain; // we want to hide the domain name in some contexts

    public function render()
    {
        return view('livewire.practice');
    }

    public function show($id) {
        return $this->redirect("/practice/$id");
    }
}
