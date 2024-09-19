<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Teacher; // Import the Teacher model
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;


class TeacherForm extends Component
{

    use WithPagination;
    protected $paginationTheme='Bootstrap';

    protected $teachers; 
    public $searchTerm; // List of teachers
    public $name, $email, $phone, $address, $qualification, $department, $hire_date, $status;
    public $editingId = null; // ID of the teacher being edited
    public $delete_id = null;

    protected $listeners = ['deleteTeacherConfirm'=>'deleteTeacher'];

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
        'qualification' => 'required|string',
        'hire_date' => 'required|date'
    ];

    public function mount()
    {
        //$this->fetchTeachers();
        $this->fetchstudentdata();
        //dd($this->teachers);
        $this->resetPage();
    }

    public function fetchstudentdata(){
        $this->teachers = Teacher::select('id','name','email','phone','department','status'); // Load all teachers //prevcode
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
            $this->dispatch('teacherEvent', status:2, message : 'Data created successfully!');
        }

        $this->resetFields();
        $this->fetchstudentdata();; // Refresh the list of teachers
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
        $this->delete_id=$id;
        $this->dispatch('show-delete-confirmation-teacher');
        
    }

    public function deleteTeacher()
    {
        $teacher = Teacher::find($this->delete_id)->delete();
        
        $this->dispatch('teacherEvent', status:3, message : 'Data deleted successfully!');
        $this->fetchstudentdata(); // Refresh the list of teachers
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

    public function fetchTeachers(){
        if($this->searchTerm){
            $this->fetchstudentdata();
            $this->teachers = $this->teachers->where(function (Builder $subQuery) {
                $subQuery->Where('name', 'LIKE', "%{$this->searchTerm}%")
                 ->orWhere('email', 'LIKE', "%{$this->searchTerm}%");
            });
            // $this->teachers = $this->teachers->where('name', 'like', '%' . $this->searchTerm . '%')
            // ->orWhere('email', 'like', '%' . $this->searchTerm . '%');
        }
       
    }

    public function updatingData()
    {
      
    }

    public function render()
    {
        $this->fetchstudentdata();
        if($this->searchTerm){
            $this->fetchTeachers();
        }
        $teachersdt= $this->teachers->paginate(5,['*']);
         return view('livewire.teacher-form', [
            'teachers' => $teachersdt
        ]);
    }
}