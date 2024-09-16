<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Teacher; // Import the Teacher model

class TeacherForm extends Component
{
    public $teachers; // List of teachers
    public $name, $email, $phone, $address, $qualification, $department, $subject, $hire_date, $status;
    public $editingId = null; // ID of the teacher being edited
    public $delete_id = null;
    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
        'qualification' => 'required|string',
        'subject' => 'required|string',
        'hire_date' => 'required|date'
    ];

    public function mount()
    {
        $this->teachers = Teacher::all(); // Load all teachers
    }

    public function save()
    {
        $this->validate();

        if ($this->editingId) {
            // Update existing teacher
            $teacher = Teacher::find($this->editingId);
            $teacher->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'qualification' => $this->qualification,
                'department' => $this->department,
                'subject' => $this->subject,
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
                'subject' => $this->subject,
                'hire_date' => $this->hire_date,
                'status' => $this->status,
            ]);
            $this->dispatch('teacherEvent', status:2, message : 'Data created successfully!');
        }

        $this->resetFields();
        $this->teachers = Teacher::all(); // Refresh the list of teachers
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
        $this->subject = $teacher->subject;
        $this->hire_date = $teacher->hire_date;
        $this->status = $teacher->status;
    }

    protected $listeners = ['deleteTeacherConfirm'=>'deleteTeacher'];
    
    public function dltTeacher($id)
    {
        $this->delete_id=$id;
        $this->dispatch('show-delete-confirmation-teacher');
        
    }

    public function deleteTeacher()
    {
        //dd($this->delete_id);
        //dd(Teacher::find($this->delete_id)->delete());
        
        $teacher = Teacher::find($this->delete_id)->delete();
        
        //session()->flash('message', 'Subject deleted successfully!');
        $this->dispatch('teacherEvent', status:3, message : 'Data deleted successfully!');
        $this->teachers = Teacher::all(); // Refresh the list of teachers
    }

    private function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->qualification = '';
        $this->department = '';
        $this->subject = '';
        $this->hire_date = '';
        $this->status = '';
        $this->editingId = null;
    }

    public function render()
    {
        return view('livewire.teacher-form');
    }
}
