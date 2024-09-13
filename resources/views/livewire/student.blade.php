<div>
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <!-- Added 'g-3' to the row for gap between columns -->
        <div class="row g-3">
            <div class="col-md-4 border">
                <form wire:submit="save">
                    <div class="form-group">
                        <label for="stud_name">Student name:</label>
                        <input type="text" class="form-control" id="stud_name" wire:model="name" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="stud_email">Email:</label>
                        <input type="email" class="form-control" id="stud_email" wire:model="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="stud_address">Address:</label>
                        <input type="text" class="form-control" id="stud_address" wire:model="address" placeholder="Enter Address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="stud_mobile">Mobile no:</label>
                        <input type="tel" class="form-control" id="stud_mobile" wire:model="mobile_no" placeholder="Enter mobile number" name="mobile">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" wire:click="createStudent()" type="button">Submit</button>
                    </div>
                </form>
            </div>

            <!-- Table Section -->
            <div class="col-md-8 border rounded p-4 shadow-sm bg-white">
                <h4 class="mb-3">Students List</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
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
