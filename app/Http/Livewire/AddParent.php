<?php

namespace App\Http\Livewire;

use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Type_Blood;
use Livewire\Component;

class AddParent extends Component
{
    public $successMessage = '';
    public $catchError,$updateMode = false,$photos,$show_table = true,$Parent_id;
    public $currentStep = 1 ;

    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => Type_Blood::all(),
            'Religions' => Religion::all(),
            // 'my_parents' => My_Parent::all(),
        ]);
    }
}
