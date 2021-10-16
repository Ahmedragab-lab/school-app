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
    public $currentStep = 1,
            // Father_INPUTS
            $Email, $Password,$Name_Father, $Name_Father_en,$National_ID_Father,
            $Passport_ID_Father,$Phone_Father, $Job_Father, $Job_Father_en,
            $Nationality_Father_id, $Blood_Type_Father_id,$Address_Father, $Religion_Father_id,
            // Mother_INPUTS
            $Name_Mother, $Name_Mother_en,$National_ID_Mother, $Passport_ID_Mother,
            $Phone_Mother, $Job_Mother, $Job_Mother_en,$Nationality_Mother_id,
            $Blood_Type_Mother_id,$Address_Mother, $Religion_Mother_id;
    // real time validation----------------------------------------------------------------------------
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'Email' => 'required|email',
            'National_ID_Father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Father' => 'min:10|max:10',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Mother' => 'min:10|max:10',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11'
        ]);
    }
    // real time validation----------------------------------------------------------------------------


    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => Type_Blood::all(),
            'Religions' => Religion::all(),
            // 'my_parents' => My_Parent::all(),
        ]);

    }
    //firstStepSubmit
    public function firstStepSubmit(){
        $this->currentStep = 2;
    }
    //secondStepSubmit
    public function secondStepSubmit()
    {
        $this->currentStep = 3;
    }

         //back
    public function back($step)
    {
        $this->currentStep = $step;
    }
}
