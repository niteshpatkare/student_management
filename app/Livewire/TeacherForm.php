<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Teacher as TeacherModel;

class TeacherForm extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap'; 

    public $searchTerm;
    public $name, $email, $phone, $address, $qualification, $department, $hire_date, $status;
    public $editingId = null; 
    public $delete_id = null;

    protected $listeners = ['deleteTeacherConfirm' => 'deleteTeacher'];

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
        'qualification' => 'required|string',
        'hire_date' => 'required|date'
    ];

    public function updatedSearchTerm()
    {
        $this->resetPage(); 
    }

    public function save()
    {
        $this->validate();

        if ($this->editingId) {
            $teacher = TeacherModel::find($this->editingId);
            $teacher->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'qualification' => $this->qualification,
                'department' => $this->department,
                'hire_date' => $this->hire_date,
                'status' => $this->status,
            ]);
            $this->dispatch('teacherEvent', ['status' => 1, 'message' => 'Data updated successfully!']);
        } else {
            TeacherModel::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'qualification' => $this->qualification,
                'department' => $this->department,
                'hire_date' => $this->hire_date,
                'status' => $this->status,
            ]);
            $this->dispatch('teacherEvent', ['status' => 2, 'message' => 'Data created successfully!']);
        }

        $this->resetFields();
        $this->resetPage();
    }

    public function edit($id)
    {
        $teacher = TeacherModel::find($id);
        $this->editingId = $id;
        $this->name = $teacher->name;
        $this->email = $teacher->email;
        $this->phone = $teacher->phone;
        $this->address = $teacher->address;
        $this->qualification = $teacher->qualification;
        $this->department = $teacher->department;
        $this->hire_date = $teacher->hire_date;
        $this->status = $teacher->status;
    }

    public function dltTeacher($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation-teacher');
    }

    public function deleteTeacher()
    {
        TeacherModel::find($this->delete_id)->delete();
        $this->dispatch('teacherEvent', ['status' => 3, 'message' => 'Data deleted successfully!']);
        $this->resetPage();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->qualification = '';
        $this->department = '';
        $this->hire_date = '';
        $this->status = '';
        $this->editingId = null;
    }

    public function fetchTeachers()
    {
        if ($this->searchTerm) {
            return TeacherModel::where('name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('email', 'like', '%' . $this->searchTerm . '%')
                ->paginate(5);
        } else {
            return TeacherModel::paginate(5);
        }
    }

    public function render()
    {
        $teachers = $this->fetchTeachers();
        return view('livewire.teacher-form', ['teachers' => $teachers]);
    }
}
