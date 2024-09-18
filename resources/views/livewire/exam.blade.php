<div class="container-fluid">
    <div class="row mt-5">
        <!-- Form Section -->
        <div class="col-md-3 p-4 shadow-sm bg-light bg-gradient">
            <form wire:submit.prevent="createOrUpdateExam">
                <div class="form-group">
                    <label for="exam_name">Exam Name:</label>
                    <input type="text" class="form-control" wire:model="exam_name" id="exam_name"
                        placeholder="Enter exam name">
                </div>
                <div class="form-group">
                    <label for="exam_code">Exam Code:</label>
                    <input type="text" class="form-control" wire:model="exam_code" id="exam_code"
                        placeholder="Enter exam code">
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <select class="form-control" wire:model="subject" id="subject">
                        <option value="">Select Subject</option>
                        <option value="Scheduled">Scheduled</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" class="form-control" wire:model="department" id="department"
                        placeholder="Enter department">
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
                    <input type="text" class="form-control" wire:model="exam_time" id="exam_time"
                        placeholder="Enter exam time">
                </div>
                <div class="form-group">
                    <label for="max_marks">Max Marks:</label>
                    <input type="number" class="form-control" wire:model="max_marks" id="max_marks"
                        placeholder="Enter max marks">
                </div>
                <div class="form-group">
                    <label for="instructions">Instructions:</label>
                    <textarea class="form-control" wire:model="instructions" id="instructions" rows="3"
                        placeholder="Enter exam instructions"></textarea>
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
            <div class="d-flex justify-content-between mb-3">
                <h4>Exam List</h4>
                <div class="input-group w-25">
                    <input type="text" class="form-control" placeholder="Search exams..." wire:model="searchTerm" wire:input="fetchExams">
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Exam Name</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Time</th>
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
                            <td>{{ $exam->exam_date }}</td>
                            <td>{{ $exam->exam_time }}</td>
                            <td>{{ $exam->status }}</td>
                            <td>
                                <div class="btn-group">
                                    <button wire:click="editExam({{ $exam->id }})"
                                        class="btn btn-outline-primary btn-sm">Edit</button>
                                    <button wire:click="dltExam({{ $exam->id }})"
                                        class="btn btn-outline-primary btn-sm">Delete</button>
                                </div>
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
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('ExamEvent', (data) => {
                //console.log(data.message);
                // Trigger IziToast notification immediately with the received message
                if (data.status == 1) {
                    iziToast.info({
                        timeout: 2000,
                        position: "topRight",
                        message: data.message, // Accessing the message from the event data
                    });
                }
                if (data.status == 2) {
                    iziToast.success({
                        timeout: 2000,
                        position: "topRight",
                        message: data.message, // Accessing the message from the event data
                    });
                }
                if (data.status == 3) {
                    iziToast.success({
                        timeout: 2000,
                        position: "topRight",
                        message: data.message, // Accessing the message from the event data
                    });
                }

            });
        });
    </script>

    <script>
        window.addEventListener('show-delete-confirmation-Exam', event => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                timeout: 800,
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteExamConfirmed')
                }
            });

        });
    </script>
</div>
