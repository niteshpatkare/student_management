<div>
    <div class="container-fluid ">
        <!-- Display success and error messages -->
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form Section -->
        <div class="row g-3 mt-5">
            <div class="col-md-3 p-4 bg-light bg-gradient">
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="sub_name">Subject Name</label>
                        <input type="text" class="form-control" id="sub_name" wire:model="sub_name"
                            placeholder="Enter subject name">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">
                            {{ $editingId ? 'Update Subject' : 'Add Subject' }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Data Table Section -->
            <div class="col-md-9">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subjects as $subject)
                            <tr>
                                <th scope="row">{{ $subject->id }}</th>
                                <td>{{ $subject->sub_name }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <button type="button" class="btn btn-outline-primary btn-sm" id="editButton"
                                            wire:click="edit({{ $subject->id }})">Edit</button>
                                        <button type="button" class="btn btn-outline-primary btn-sm"
                                            wire:click="delete({{ $subject->id }})">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No subjects found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('subjectEvent', (data) => {
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
        window.addEventListener('show-delete-confirmation-subject', event => {
<<<<<<< HEAD
        //alert("Okay1");
=======
>>>>>>> 9eee503cec9bb872a2ecbeded48888c389f1fd96
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
                    Livewire.dispatch('deleteSubjectConfirm')
                }
            });

        });
    </script>


</div>
