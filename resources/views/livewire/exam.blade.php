<div class="container-fluid">
    <div class="row mt-5">
        <!-- Form Section -->
        <div class="col-md-3 p-4 shadow-sm bg-light bg-gradient">
            <!-- <h2>Add/Edit Exam</h2> -->
            <form wire:submit.prevent="createOrUpdateExam">
                <div class="form-group">
                    <label for="exam_name">Exam Name:</label>
                    <input type="text" class="form-control" wire:model="exam_name" id="exam_name" placeholder="Enter exam name">
                </div>
                <div class="form-group">
                    <label for="exam_code">Exam Code:</label>
                    <input type="text" class="form-control" wire:model="exam_code" id="exam_code" placeholder="Enter exam code">
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" wire:model="subject" id="subject" placeholder="Enter subject">
                </div>
                <!-- <div class="form-group">
                    <label for="teacher">Teacher:</label>
                    <input type="text" class="form-control" wire:model="teacher" id="teacher" placeholder="Enter teacher's name">
                </div> -->
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" class="form-control" wire:model="department" id="department" placeholder="Enter department">
                </div> 
                <div class="form-group">
                    <label for="exam_type">Exam Type:</label>
                    <select class="form-control" wire:model="exam_type" id="exam_type">
                        <option value="Written">Written</option>
                        <option value="Oral">Oral</option>
                        <option value="Practical">Practical</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exam_date">Exam Date:</label>
                    <input type="date" class="form-control" wire:model="exam_date" id="exam_date">
                </div>
                <div class="form-group">
                    <label for="exam_time">Exam Time:</label>
                    <input type="text" class="form-control" wire:model="exam_time" id="exam_time" placeholder="Enter exam time">
                </div>
                <!-- <div class="form-group">
                    <label for="duration">Duration:</label>
                    <input type="text" class="form-control" wire:model="duration" id="duration" placeholder="Enter exam duration">
                </div> -->
                <!-- <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" wire:model="location" id="location" placeholder="Enter exam location">
                </div> -->
                <div class="form-group">
                    <label for="max_marks">Max Marks:</label>
                    <input type="number" class="form-control" wire:model="max_marks" id="max_marks" placeholder="Enter max marks">
                </div>
                <!-- <div class="form-group">
                    <label for="passing_marks">Passing Marks:</label>
                    <input type="number" class="form-control" wire:model="passing_marks" id="passing_marks" placeholder="Enter passing marks">
                </div> -->
                <div class="form-group">
                    <label for="instructions">Instructions:</label>
                    <textarea class="form-control" wire:model="instructions" id="instructions" rows="3" placeholder="Enter exam instructions"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" wire:model="status" id="status">
                        <option value="Scheduled">Scheduled</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

        <div class="col-md-9">
            <!-- <h2>Exam List</h2>
            <input type="text" class="form-control mb-3" placeholder="Search by exam name or code"> -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Exam Name</th>
                        <th>Subject</th>
                        <!-- <th>Teacher</th> -->
                        <th>Date</th>
                        <th>Time</th>
                        <!-- <th>Location</th> -->
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    @forelse($exams as $exam)
                        <tr>
                            <td>{{ $exam->id }}</td>
                            <td>{{ $exam->exam_name }}</td>
                            <td>{{ $exam->exam_code }}</td>
                            <td>{{ $exam->subject }}</td>
                            <!-- <td>{{ $exam->teacher }}</td> -->
                            <td>{{ $exam->exam_date }}</td>
                            <td>{{ $exam->exam_time }}</td>
                            <!-- <td>{{ $exam->location }}</td> -->
                            <td>{{ $exam->status }}</td>
                            <td>
                                <button wire:click="editExam({{ $exam->id }})" class="btn btn-outline-primary btn-sm">Edit</button>
                                <button wire:click="deleteExam({{ $exam->id }})" class="btn btn-outline-primary btn-sm">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No exams found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
        </div>
    </div>
</div>