<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student as StudentModel;

class Student extends Component
{
    public $name, $email, $address, $mobile_no, $student_id;
    public $students;
    public $delete_id;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => 'required|email|unique:students,email,' . $this->student_id,
            'address' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:10',
        ];
    }

    public function mount()
    {
        $this->fetchStudents(); 
    }

    public function fetchStudents()
    {
        $this->students = StudentModel::all();
    }

    public function submit()
    {
        $this->validate();

        if ($this->student_id) {
            $student = StudentModel::find($this->student_id);
            $student->update([
                'name' => $this->name,
                'email' => $this->email,
                'address' => $this->address,
                'mobile_no' => $this->mobile_no,
            ]);
            $this->dispatch('studentEvent', status: 1, message : 'Data updated successfully!');
        } else {
            StudentModel::create([
                'name' => $this->name,
                'email' => $this->email,
                'address' => $this->address,
                'mobile_no' => $this->mobile_no,
            ]);
            $this->dispatch('studentEvent', status: 2, message : 'Data created successfully!');
        }

        $this->reset(['name', 'email', 'address', 'mobile_no', 'student_id']);
        $this->fetchStudents();
        //session()->flash('message', 'Student information saved successfully.');
       
    }

    public function edit($id)
    {
        $student = StudentModel::find($id);
        $this->student_id = $student->id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->address = $student->address;
        $this->mobile_no = $student->mobile_no;
    }

    protected $listeners = ['deleteStudentConfirm'=>'deleteStudent'];

   

    public function dltStudent($id)
    {
        $this->delete_id=$id;
        $this->dispatch('show-delete-confirmation-student');
    }

    public function deleteStudent()
    {
        $student = StudentModel::find($this->delete_id)->delete();

        $this->dispatch('studentEvent', status: 3, message : 'Data deleted successfully!');
        $this->students = StudentModel::all(); // Refresh the list of subjects
    }

    public function render()
    {
        return view('livewire.student');
    }
}

