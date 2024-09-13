<?php

namespace App\Livewire;

use Livewire\Component;

class Student extends Component
{
    public $name,$email,$address,$mobile_no;
    public $data;

    public function render()
    {
        return view('livewire.student');
    }


}
