<div class="container-fluid">
    <div class="row mt-5">
        <!-- Form Section -->
        <div class="col-md-3 shadow-sm p-4 bg-light bg-gradient">
            <!-- <h2>{{ $editingId ? 'Edit Teacher' : 'Add Teacher' }}</h2> -->
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <label for="teach_name">Name:</label>
                    <input type="text" class="form-control" id="teach_name" wire:model="name"
                        placeholder="Enter teacher's full name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="teach_email">Email:</label>
                    <input type="email" class="form-control" id="teach_email" wire:model="email"
                        placeholder="Enter teacher's email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="teach_phone">Phone:</label>
                    <input type="text" class="form-control" id="teach_phone" wire:model="phone"
                        placeholder="Enter teacher's phone number">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="teach_address">Address:</label>
                    <input type="text" class="form-control" id="teach_address" wire:model="address"
                        placeholder="Enter teacher's address">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="teach_qualification">Qualification:</label>
                    <input type="text" class="form-control" id="teach_qualification" wire:model="qualification"
                        placeholder="Enter teacher's qualifications">
                    @error('qualification')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="teach_department">Department:</label>
                    <select class="form-control" id="teach_department" wire:model="department">
                        <option value="">Select Department</option> <!-- Add a default empty option -->
                        <option value="computer_science">Computer Science</option>
                        <option value="mathematics">Mathematics</option>
                        <option value="physics">Physics</option>
                        <option value="chemistry">Chemistry</option>
                    </select>
                    @error('department')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="teach_subject">Subject:</label>
                    <select class="form-control" id="teach_subject" wire:model="subject">
                        <option value="programming">Programming</option>
                        <option value="data_structures">Data Structures</option>
                        <option value="algorithms">Algorithms</option>
                        <option value="web_development">Web Development</option>
                        <option value="databases">Databases</option>
                    </select>
                    @error('subject')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hire_date">Hire Date:</label>
                    <input type="date" class="form-control" id="hire_date" wire:model="hire_date">
                    @error('hire_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" wire:model="status">
                        <option value="">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="On Leave">On Leave</option>
                        <option value="Retired">Retired</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">{{ $editingId ? 'Update' : 'Save' }}</button>
            </form>
        </div>

        <!-- Data Table Section -->
        <div class="col-md-9 ">
            <!-- <h2>Teacher List</h2>
            <input type="text" class="form-control mb-3" placeholder="Search by name or email" wire:model="search"> -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->phone }}</td>
                            <td>{{ $teacher->department }}</td>
                            <td>{{ $teacher->subject }}</td>
                            <td>{{ $teacher->status }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                        wire:click="edit({{ $teacher->id }})">Edit</button>
                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                        wire:click="dltTeacher({{ $teacher->id }})">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No Teachers Available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('teacherEvent', (data) => {
                //console.log(data.message);
                // Trigger IziToast notification immediately with the received message
                if (data.status == 1) {
                    iziToast.info({
                        position: "topRight",
                        message: data.message, // Accessing the message from the event data
                    });
                }
                if (data.status == 2) {
                    iziToast.success({
                        position: "topRight",
                        message: data.message, // Accessing the message from the event data
                    });
                }
                if (data.status == 3) {
                    iziToast.success({
                        position: "topRight",
                        message: data.message, // Accessing the message from the event data
                    });
                }

            });
        });
    </script>

    <script>
        window.addEventListener('show-delete-confirmation-teacher', event => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteTeacherConfirm')
                }
            });

        });
    </script>

</div>
