<!-- resources/views/tasks.blade.php -->

<x-layout>
    <div class="container-fluid">
        <ul class="nav justify-content-center nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="true">Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="teacher-tab" data-toggle="tab" href="#teacher" role="tab" aria-controls="teacher" aria-selected="false">Teacher</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="subject-tab" data-toggle="tab" href="#subject" role="tab" aria-controls="subject" aria-selected="false">Subject</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="exam-tab" data-toggle="tab" href="#exam" role="tab" aria-controls="exam" aria-selected="false">Exam</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="student-tab">
                <h3 style="text-align: center">Student Information</h3>
                @livewire('student')
            </div>
            <div class="tab-pane fade" id="teacher" role="tabpanel" aria-labelledby="teacher-tab">
                <h3 style="text-align: center">Teacher</h3>
                @livewire('teacher')
                <p>Teacher Data</p>
            </div>
            <div class="tab-pane fade" id="subject" role="tabpanel" aria-labelledby="subject-tab">
                <h3 style="text-align: center">Student Information</h3>
                @livewire('subject')
            </div>
            <div class="tab-pane fade" id="exam" role="tabpanel" aria-labelledby="exam-tab">
                <h3 style="text-align: center">Exam Information</h3>
                @livewire('exam')
            </div>
        </div>
    </div>
</x-layout>
