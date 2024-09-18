<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Exam as ExamModel;
use App\Models\Subject as SubjectModel;
use App\Models\Student as StudentModel;
use App\Models\ExamDetail;

class ExamDetailsForm extends Component
{
    public $exam_id;
    public $sub_id; 
    public $stud_id; 
    public $sub_details;
    public $stud_details;
    public $exam_details, $exam_detail;
    public $editingId;
    public $add_examdetails;
    public $examdetail_id;

    public function mount()
    {
        $this->exam_details = ExamModel::all();
        $this->sub_details = SubjectModel::all();
        $this->stud_details = StudentModel::all();
        $this->add_examdetails = ExamDetail::with('subjectBelongsTo')->get();
        //dd($this->add_examdetails->first());
        //dd($this->add_examdetails, $this->add_examdetails->first(), $this->add_examdetails->first()->subjects );
    }

    public function save()
    {
       
        if ($this->editingId) {
            $examdetail_id = ExamDetail::find($this->editingId);

            if ($examdetail_id) {
                $examdetail_id->update([
                    'exam_id' => $this->exam_id,
                    'sub_id' => $this->sub_id,
                    'stud_id' => $this->stud_id
                    
                ]);
               
                // $this->dispatch('subjectEvent', status: 1, message : 'Data updated successfully!');
                
            } 
        } else {
            
            ExamDetail::create([
                'exam_id' => $this->exam_id,
                'sub_id' => $this->sub_id,
                'stud_id' => $this->stud_id
            ]);
         
            //$this->dispatch('subjectEvent', status:2, message : 'Data created successfully!');
            
        
        }

        //$this->resetFields();
        $this->exam_details  = ExamDetail::all();
        
    }

    public function edit($id)
    {
        $examdetail_id = ExamDetail::find($id);

        if ($examdetail_id) {
            $this->editingId = $id;
            $this->exam_id = $examdetail_id->exam_id;
            $this->sub_id = $examdetail_id->sub_id;
            $this->stud_id = $examdetail_id->stud_id;
        } else {
            session()->flash('error', 'Subject not found.');
        }
    }

    public function render()
    {
        return view('livewire.exam-details-form');
    }
}
