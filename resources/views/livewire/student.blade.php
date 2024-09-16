
    <div class="container-fluild">
        <div class="row mt-5">
            <!-- Form Section -->
            <div class="col-md-3 p-4 shadow-sm bg-light bg-gradient">
                <h4 class="mb-3">Add/Update Student</h4>
                <form wire:submit.prevent="submit">
                    <div class="mb-3">
                        <label for="stud_name" class="form-label">Student Name:</label>
                        <input type="text" class="form-control" id="stud_name" placeholder="Enter name" wire:model="name">
                        @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stud_email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="stud_email" placeholder="Enter email" wire:model="email">
                        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stud_address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="stud_address" placeholder="Enter Address" wire:model="address">
                        @error('address') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stud_mobile" class="form-label">Mobile No:</label>
                        <input type="tel" class="form-control" id="stud_mobile" placeholder="Enter mobile number" wire:model="mobile_no">
                        @error('mobile_no') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>

            <!-- Table Section -->
            <div class="col-md-9 shadow-sm bg-white">
                <!-- <h4 class="mb-3">Students List</h4> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile No</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <th scope="row">{{ $student['id'] }}</th>
                                    <td>{{ $student['name'] }}</td>
                                    <td>{{ $student['email'] }}</td>
                                    <td>{{ $student['mobile_no'] }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-outline-primary btn-sm" wire:click="edit({{ $student['id'] }})">Edit</button>
                                            <button class="btn btn-outline-primary btn-sm" wire:click="delete({{ $student['id'] }})">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Students Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>