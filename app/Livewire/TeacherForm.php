<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Teacher;

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
            $teacher = Teacher::find($this->editingId);
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
            $this->dispatch('teacherEvent', status: 1, message : 'Data updated successfully!');
        } else {
            // Create new teacher
            Teacher::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'qualification' => $this->qualification,
                'department' => $this->department,
                'hire_date' => $this->hire_date,
                'status' => $this->status,
            ]);
            $this->dispatch('teacherEvent', status: 2, message : 'Data created successfully!');
        }

        $this->resetFields();
        // Reset pagination after saving
        $this->resetPage();
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
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
        Teacher::find($this->delete_id)->delete();
        $this->dispatch('teacherEvent', status: 3, message : 'Data deleted successfully!');
        // Reset pagination after deletion
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

    public function render()
    {
        // Apply search filter and pagination
        $teachers = Teacher::query()
            ->when($this->searchTerm, function ($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%')
                      ->orWhere('email', 'like', '%' . $this->searchTerm . '%');
            })
            ->paginate(5); 

        return view('livewire.teacher-form', ['teachers' => $teachers]);
    }
}
