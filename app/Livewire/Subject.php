<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subject as SubjectModel;

class Subject extends Component
{
    public $subjects; // List of subjects
    public $sub_name; // Subject name
    public $editingId = null; // ID of the subject being edited

    protected $rules = [
        'sub_name' => 'required|string',
    ];

    public function mount()
    {
        $this->subjects = SubjectModel::all(); // Load all subjects initially
    }

    public function save()
    {
        $this->validate(); // Validate the input

        if ($this->editingId) {
            // Update existing subject
            $subject = SubjectModel::find($this->editingId);

            if ($subject) {
                $subject->update([
                    'sub_name' => $this->sub_name,
                ]);
                session()->flash('message', 'Subject updated successfully!');
            } else {
                session()->flash('error', 'Subject not found.');
            }
        } else {
            // Create new subject
            //dd($this->sub_name);
            SubjectModel::create([
                'sub_name' => $this->sub_name
            ]);
            session()->flash('message', 'Subject created successfully!');
        }

        $this->resetFields();
        $this->subjects = SubjectModel::all(); // Refresh the list of subjects
    }

    public function edit($id)
    {
        $subject = SubjectModel::find($id);

        if ($subject) {
            $this->editingId = $id;
            $this->sub_name = $subject->sub_name;
        } else {
            session()->flash('error', 'Subject not found.');
        }
    }

    public function delete($id)
    {
        $subject = SubjectModel::find($id);

        if ($subject) {
            $subject->delete();
            session()->flash('message', 'Subject deleted successfully!');
        } else {
            session()->flash('error', 'Subject not found.');
        }

        $this->subjects = SubjectModel::all(); // Refresh the list of subjects
    }

    private function resetFields()
    {
        $this->sub_name = '';
        $this->editingId = null;
    }

    public function render()
    {
        return view('livewire.subject');
    }
    
}
