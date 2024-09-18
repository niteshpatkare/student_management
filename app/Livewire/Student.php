<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student as StudentModel;
use Livewire\WithPagination;

class Student extends Component
{
    use WithPagination;
    protected $paginationTheme = 'Bootstrap';

    public $name, $email, $address, $mobile_no, $student_id;
    public $searchTerm = '';
    public $delete_id;

    protected $listeners = ['deleteStudentConfirm' => 'deleteStudent'];
    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => 'required|email|unique:students,email,' . $this->student_id,
            'address' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:10',
        ];
    }

    public function submit()
    {
        $this->validate();
        if ($this->student_id) {
            $this->updateStudent();
        } else {
            $this->createStudent(); 
        }

        $this->resetForm();
    }

    public function createStudent()
    {
        StudentModel::create([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'mobile_no' => $this->mobile_no,
        ]);

        $this->dispatch('studentEvent', ['status' => 2, 'message' => 'Data created successfully!']);
    }

    public function updateStudent()
    {
        $student = StudentModel::find($this->student_id);
        $student->update([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'mobile_no' => $this->mobile_no,
        ]);

        $this->dispatch('studentEvent', ['status' => 1, 'message' => 'Data updated successfully!']);
    }

    public function edit($id)
    {
        $student = StudentModel::find($id);
        $this->fillStudentData($student); // Use a separate function to fill data
    }

    public function fillStudentData($student)
    {
        $this->student_id = $student->id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->address = $student->address;
        $this->mobile_no = $student->mobile_no;
    }

    public function dltStudent($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation-student');
    }

    public function deleteStudent()
    {
        StudentModel::find($this->delete_id)->delete();
        $this->dispatch('studentEvent', ['status' => 3, 'message' => 'Data deleted successfully!']);
    }

    public function resetForm()
    {
        $this->reset(['name', 'email', 'address', 'mobile_no', 'student_id']);
    }

    public function render()
    {
        if ($this->searchTerm)
        {
            $query = StudentModel::where('name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('email', 'like', '%' . $this->searchTerm . '%')
            // $students = $query->
            ->paginate(5);
        } else{
            $students = StudentModel::paginate(5);
        }    
        return view('livewire.student', ['students' => $students]);
    }
}

