<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Exam as ExamModel;
use App\Models\Subject as SubjectModel;

class Exam extends Component
{
    public $exam_name, $exam_code, $subject, $teacher, $department, $exam_type, $exam_date, $exam_time, $duration, $location, $max_marks, $passing_marks, $instructions, $status, $examId;
    public $isEditing = false;
    public $delete_id;
    public $sub_details;


    protected $rules = [
        'exam_name' => 'required',
        'exam_code' => 'required',
        'subject' => 'required',
        'department' => 'required',
        'exam_type' => 'required',
        'exam_date' => 'required|date',
        'exam_time' => 'required',
        'max_marks' => 'required|numeric',
        'instructions' => 'nullable',
        'status' => 'required'
    ];

    public function mount(){
        //$sub_details=SubjectModel::find(1);
        //dd($sub_details->sub_name);
    }


  
    public function createOrUpdateExam()
    {
 
        if ($this->isEditing) {
            $exam = ExamModel::find($this->examId);
            $exam->update($this->getInput());
            $this->dispatch('ExamEvent', status: 1, message : 'Data updated successfully!');
        } else {
           
            $exam=ExamModel::create($this->getInput());
            $this->dispatch('ExamEvent', status: 2, message : 'Data created successfully!');
        }

        $this->resetForm();
    }
    

    public function getInput()
    {
        return [
            'exam_name' => $this->exam_name,
            'exam_code' => $this->exam_code,
            'subject' => $this->subject,
            'department' => $this->department,
            'exam_type' => $this->exam_type,
            'exam_date' => $this->exam_date,
            'exam_time' => $this->exam_time,
            'max_marks' => $this->max_marks,
            'instructions' => $this->instructions,
            'status' => $this->status,
        ];
    }

    public function editExam($id)
    {
        $exam = ExamModel::find($id);
        $this->examId = $exam->id;
        $this->exam_name = $exam->exam_name;
        $this->exam_code = $exam->exam_code;
        $this->subject = $exam->subject;
        $this->department = $exam->department;
        $this->exam_type = $exam->exam_type;
        $this->exam_date = $exam->exam_date;
        $this->exam_time = $exam->exam_time;
        $this->max_marks = $exam->max_marks;
        $this->instructions = $exam->instructions;
        $this->status = $exam->status;
        $this->isEditing = true;
    }

    // public function deleteExam($id)
    // {
    //     ExamModel::find($id)->delete();
    // }

    // protected $listeners = ['deleteConfirmed'=>'deleteExam'];

    // public function delete($id){
    //     $this->delete_id=$id;
    //     $this->dispatch('show-delete-confirmation');

    // }

    protected $listeners = ['deleteExamConfirmed'=>'deleteExam'];

    public function dltExam($id)
    {
        $this->delete_id=$id;
        $this->dispatch('show-delete-confirmation-Exam');
    }

    public function deleteExam()
    {
        $exam = ExamModel::find($this->delete_id)->delete();

        $this->dispatch('ExamEvent', status: 3, message : 'Data deleted successfully!');
        $this->exams = ExamModel::all();
    }

    public function resetForm()
    {
        $this->exam_name = '';
        $this->exam_code = '';
        $this->subject = '';
        $this->department = '';
        $this->exam_type = '';
        $this->exam_date = '';
        $this->exam_time = '';
        $this->max_marks = '';
        $this->instructions = '';
        $this->status = '';
        $this->isEditing = false;
    }

    public function render()
    {
        //dd(Exam::all());
        return view('livewire.exam', ['exams' => ExamModel::all()]);
    }
}
