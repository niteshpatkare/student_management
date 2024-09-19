<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subject as SubjectModel;
use App\Models\Teacher;

class Subject extends Component
{
    public $subjects; 
    public $sub_name;     
    public $teach_id;
    public $editingId = null; 
    public $delete_id;
    public $teach_details;
    
    protected $listeners = ['deleteSubjectConfirm' => 'deleteSubject'];

    protected $rules = [
        'sub_name' => 'required|string',
        'teach_id' => 'required|exists:teachers,id', // Added validation for teacher ID
    ];
    
    public function mount()
    {
        // Eager load the related teacher for subjects
        $this->subjects = SubjectModel::with('teacher')->where('is_active', 1)->get(); 
        $this->teach_details = Teacher::all(); // Load all teachers
    }
    
    public function save()
    {
        $this->validate(); 

        if ($this->editingId) {
            // Update existing subject
            $subject = SubjectModel::find($this->editingId);

            if ($subject) {
                $subject->update([
                    'sub_name' => $this->sub_name,
                    'teach_id' => $this->teach_id,
                ]);
               
                $this->dispatch('subjectEvent', ['status' => 1, 'message' => 'Data updated successfully!']);
            } 
        } else {
            // Create a new subject
            SubjectModel::create([
                'sub_name' => $this->sub_name,
                'teach_id' => $this->teach_id,
            ]);

            $this->dispatch('subjectEvent', ['status' => 2, 'message' => 'Data created successfully!']);
        }

        $this->resetFields();
        $this->subjects = SubjectModel::with('teacher')->where('is_active', 1)->get(); // Refresh with eager loading
    }

    public function edit($id)
    {
        $subject = SubjectModel::find($id);

        if ($subject) {
            $this->editingId = $id;
            $this->sub_name = $subject->sub_name;
            $this->teach_id = $subject->teach_id;
        } else {
            session()->flash('error', 'Subject not found.');
        }
    }

    public function delete($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation-subject');
    }

    public function deleteSubject()
    {
        SubjectModel::find($this->delete_id)->update(['is_active' => 0]); // Soft delete by updating 'is_active'

        $this->dispatch('subjectEvent', ['status' => 3, 'message' => 'Data deleted successfully!']);
        $this->subjects = SubjectModel::with('teacher')->where('is_active', 1)->get(); // Refresh with eager loading
    }

    private function resetFields()
    {
        $this->sub_name = '';
        $this->editingId = null;
        $this->teach_id = null;
    }

    public function refreshTeacher()
    {
        $this->teach_details = Teacher::all(); // Reload teacher details
    }

    public function render()
    {
        return view('livewire.subject');
    }
}
