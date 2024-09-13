<?php

namespace App\Livewire;

use Livewire\Component;

class Student extends Component
{
    public $name,$email,$address,$mobile_no;
    public $data;

   
 
    public function createStudent()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'mobile_no' => $this->mobile_no
        ];
        
        

        Student::create($this->data);
        session()->flash('message', 'Student created successfully!');
        $this->reset('data');
       
    }
 

    public function render()
    {
        return view('livewire.student');
    }


}
