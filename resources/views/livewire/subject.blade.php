<div>
    <div class="container">
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
        <div class="row g-3">
            <div class="col-md-4 border">
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="sub_name">Subject Name</label>
                        <input type="text" class="form-control" id="sub_name" wire:model="sub_name" placeholder="Enter subject name">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">
                            {{ $editingId ? 'Update Subject' : 'Add Subject' }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Data Table Section -->
            <div class="col-md-8 border">
                <table class="table">
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
                                        <button type="button" class="btn btn-outline-primary btn-sm" wire:click="edit({{ $subject->id }})">Edit</button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" wire:click="delete({{ $subject->id }})">Delete</button>
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
</div>
