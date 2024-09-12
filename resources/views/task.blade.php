<!-- resources/views/tasks.blade.php -->

<x-layout>
    <div class="container-fluid">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#student">Student</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#teacher">Teacher</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#subject">Subject</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#exam">Exam</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="student" class="tab-pane fade in active">
            <h3>HOME</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
        </div>
        <div id="teacher" class="tab-pane fade">
            <h3>Menu 1</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
        </div>
        <div id="subject" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                rem aperiam.</p>
        </div>
        <div id="exam" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
        </div>
    </div>
    </div>
</x-layout>z
