<?php

namespace App\Http\Livewire;

use App\Models\BustaPaga;
use App\View\Components\AppLayout;
use Livewire\Component;

class UploadsBustePaga extends Component
{

    public $bustePaga;
    public $anno;
    public $mese;

    public function render($messaggio)
    {
        return view('livewire.uploadBustePaga',['messaggio' => $messaggio]);
    }
}
