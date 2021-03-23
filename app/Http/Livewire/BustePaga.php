<?php

namespace App\Http\Livewire;

use App\Models\BustaPaga;
use App\Models\Dipendente;
use App\View\Components\AppLayout;
use Livewire\Component;

class BustePaga extends Component
{
    public function render($id)
    {
        $dipendente = Dipendente::where('id',$id)->first();
        $bustePaga = BustaPaga::where('dipendente_id',$id)->get();

        return view('livewire.bustepaga',['id'=>$id,'nome'=>$dipendente->nome, 'bustepaga'=>$bustePaga]);
    }
}
