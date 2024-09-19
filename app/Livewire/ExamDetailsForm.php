<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Exam as ExamModel;
use App\Models\Subject as SubjectModel;
use App\Models\Student as StudentModel;
use App\Models\ExamDetail;
use Livewire\WithPagination;

class ExamDetailsForm extends Component
{

    use WithPagination;
    protected $paginationTheme='Bootstrap';
    public $exam_id;
    public $sub_id; 
    public $stud_id; 
    public $sub_details;
    public $stud_details;
    public $exam_details, $exam_detail;
    public $editingId;
    protected $add_examdetails;
    public $examdetail_id;
    public $delete_id;

    protected $listeners = ['deleteExamdetailConfirm'=>'deleteTeacher'];


    public function mount()
    {
        $this->exam_details = ExamModel::all();
        $this->sub_details = SubjectModel::all();
        $this->stud_details = StudentModel::all();
        $this->fetchexamdtldata();
    }

    public function fetchexamdtldata(){
        $this->add_examdetails = ExamDetail::with('subjectBelongsTo', 'examBelongsTo', 'studentBelongsTo'); // Load all teachers //prevcode
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
               
                $this->dispatch('examdetailEvent', status: 1, message : 'Data updated successfully!');
                $this->fetchexamdtldata();
            } 
        } else {
            
            ExamDetail::create([
                'exam_id' => $this->exam_id,
                'sub_id' => $this->sub_id,
                'stud_id' => $this->stud_id
            ]);
         
            $this->dispatch('examdetailEvent', status:2, message : 'Data created successfully!');
            $this->fetchexamdtldata();
        
        }

        $this->resetFields();
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

    public function dltTeacher($id)
    {
        $this->delete_id=$id;
        $this->dispatch('show-delete-confirmation-examdetail');
        
    }

    public function deleteTeacher()
    {
        $exam = ExamDetail::find($this->delete_id)->delete();
        
        $this->dispatch('examdetailEvent', status:3, message : 'Data deleted successfully!');
        $this->fetchexamdtldata(); // Refresh the list of teachers
    }

    private function resetFields()
    {
        $this->exam_id = null;
        $this->sub_id = null;
        $this->teach_id = null;
    }

    public function render()
    {
        $this->fetchexamdtldata();
        $examdetaildt= $this->add_examdetails->paginate(10);
        return view('livewire.exam-details-form', [
            'add_examdetails' => $examdetaildt
        ]);
        
    }
}
