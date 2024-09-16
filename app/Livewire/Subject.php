<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subject as SubjectModel;

class Subject extends Component
{
    public $subjects; // List of subjects
    public $sub_name; // Subject name
    public $editingId = null; // ID of the subject being edited
    public $delete_id;

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
                //session()->flash('message', 'Subject updated successfully!');
                //$this->dispatch('subjectUpdated', ['message'=>"data Updated succesfully"]);
                $this->dispatch('subjectEvent', status: 1, message : 'Data updated successfully!');
                
            } 
        } else {
            // Create new subject
            //dd($this->sub_name);
            SubjectModel::create([
                'sub_name' => $this->sub_name
            ]);
            //session()->flash('message', 'Subject created successfully!');
            $this->dispatch('subjectEvent', status:2, message : 'Data created successfully!');
            
        
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

    protected $listeners = ['deleteConfirmed'=>'deleteSubject'];

    public function delete($id){
        $this->delete_id=$id;
        $this->dispatch('show-delete-confirmation');

    }

    public function deleteSubject()
    {
        
        //$subject = SubjectModel::find($this->delete_id)->update(['is_active' => 1]);
        $subject = SubjectModel::find($this->delete_id)->delete();

        //session()->flash('message', 'Subject deleted successfully!');
        $this->dispatch('subjectEvent', status:3, message : 'Data deleted successfully!');
            

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