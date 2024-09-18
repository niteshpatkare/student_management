<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Exam as ExamModel;
use App\Models\Subject as SubjectModel;
use App\Models\Student as StudentModel;
use App\Models\ExamDetail;

class ExamDetailsForm extends Component
{
    public $exam_id; // List of subjects
    public $sub_id; // Subject name
    public $stud_id; 
    public $sub_details;
    public $stud_details;
    public $exam_details, $exam_detail;
    public $editingId;
    public $add_examdetails;

    public function mount()
    {
        $this->exam_details = ExamModel::all();
        $this->sub_details = SubjectModel::all();
        $this->stud_details = StudentModel::all();
        $this->add_examdetails = ExamDetail::all();
    }
    
    public function render()
    {
        return view('livewire.exam-details-form');
    }
}
