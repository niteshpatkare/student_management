<!-- resources/views/tasks.blade.php -->
<x-layout>
    <div class="container-fluid">
        <ul class="nav justify-content-center nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="student-tab" data-toggle="tab" href="#student" role="tab"
                    aria-controls="student" aria-selected="true">Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="teacher-tab" data-toggle="tab" href="#teacher" role="tab"
                    aria-controls="teacher" aria-selected="false">Teacher</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="subject-tab" data-toggle="tab" onclick="refreshTeacher()" href="#subject" role="tab" aria-controls="subject" aria-selected="false">Subject</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="exam-tab" data-toggle="tab" href="#exam" role="tab" aria-controls="exam"
                    aria-selected="false">Exam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="examdetail-tab" data-toggle="tab" href="#examdetail" role="tab" aria-controls="examdetail" aria-selected="false">Add Exam</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="student-tab">
                @livewire('student')
            </div>
            <div class="tab-pane fade" id="teacher" role="tabpanel" aria-labelledby="teacher-tab">

                @livewire('teacher-form')

            </div>
            <div class="tab-pane fade" id="subject"  role="tabpanel" aria-labelledby="subject-tab">
                
                @livewire('subject')
            </div>
            <div class="tab-pane fade" id="exam" role="tabpanel" aria-labelledby="exam-tab">

                @livewire('exam')
            </div>
            <div class="tab-pane fade" id="examdetail" role="tabpanel" aria-labelledby="examdetail-tab">
               
                @livewire('exam-details-form')
            </div>
        </div>
    </div>
</x-layout>
