<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Exam as ExamModel;

class Exam extends Component
{
    public $exam_name, $exam_code, $subject, $teacher, $department, $exam_type, $exam_date, $exam_time, $duration, $location, $max_marks, $passing_marks, $instructions, $status, $examId;
    public $isEditing = false;

    protected $rules = [
        'exam_name' => 'required',
        'exam_code' => 'required',
        'subject' => 'required',
        'teacher' => 'required',
        'department' => 'required',
        'exam_type' => 'required',
        'exam_date' => 'required|date',
        'exam_time' => 'required',
        'duration' => 'required',
        'location' => 'required',
        'max_marks' => 'required|numeric',
        'passing_marks' => 'required|numeric',
        'instructions' => 'nullable',
        'status' => 'required'
    ];
    

    public function createOrUpdateExam()
    {
        //dd($this->getInput());
        //dd($this->isEditing);
        //dd($this->validate());
        
        

        if ($this->isEditing) {
            $exam = ExamModel::find($this->examId);
            $exam->update($this->getInput());
        } else {
           
            $exam=ExamModel::create($this->getInput());
            //dd($exam);
        }

        $this->resetForm();
    }
    

    public function getInput()
    {
        return [
            'exam_name' => $this->exam_name,
            'exam_code' => $this->exam_code,
            'subject' => $this->subject,
            'teacher' => $this->teacher,
            'department' => $this->department,
            'exam_type' => $this->exam_type,
            'exam_date' => $this->exam_date,
            'exam_time' => $this->exam_time,
            'duration' => $this->duration,
            'location' => $this->location,
            'max_marks' => $this->max_marks,
            'passing_marks' => $this->passing_marks,
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
        $this->teacher = $exam->teacher;
        $this->department = $exam->department;
        $this->exam_type = $exam->exam_type;
        $this->exam_date = $exam->exam_date;
        $this->exam_time = $exam->exam_time;
        $this->duration = $exam->duration;
        $this->location = $exam->location;
        $this->max_marks = $exam->max_marks;
        $this->passing_marks = $exam->passing_marks;
        $this->instructions = $exam->instructions;
        $this->status = $exam->status;
        $this->isEditing = true;
    }

    public function deleteExam($id)
    {
        ExamModel::find($id)->delete();
    }

    public function resetForm()
    {
        $this->exam_name = '';
        $this->exam_code = '';
        $this->subject = '';
        $this->teacher = '';
        $this->department = '';
        $this->exam_type = '';
        $this->exam_date = '';
        $this->exam_time = '';
        $this->duration = '';
        $this->location = '';
        $this->max_marks = '';
        $this->passing_marks = '';
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
