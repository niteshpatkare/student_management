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

            <div class="col-md-8 border">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">StudentID</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile No</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>John</td>
                            <td>john123@gmail.com</td>
                            <td>1263549878</td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary btn-sm">Edit</button>
                                <button type="button" class="btn btn-outline-primary btn-sm">Delete</button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Smith</td>
                            <td>smith123@gmail.com</td>
                            <td>1234567890</td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary btn-sm">Edit</button>
                                <button type="button" class="btn btn-outline-primary btn-sm">Delete</button>
                            </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
