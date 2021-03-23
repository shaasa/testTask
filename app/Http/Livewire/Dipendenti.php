<?php

namespace App\Http\Livewire;

use App\Models\Dipendente;
use Livewire\Component;

class Dipendenti extends Component
{
    public function render()
    {
        $dipendenti = Dipendente::orderBy('id','ASC')->get();
        return view('livewire.dipendenti',['dipendenti'=>$dipendenti]);
    }
}
