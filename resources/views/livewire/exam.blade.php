<div class="container">
    <div class="row g-3">
        <!-- Form Section -->
        <div class="col-md-4 border">
            <h2>Add/Edit Exam</h2>
            <form>
                <div class="form-group">
                    <label for="exam_name">Exam Name:</label>
                    <input type="text" class="form-control" id="exam_name" placeholder="Enter exam name">
                </div>
                <div class="form-group">
                    <label for="exam_code">Exam Code:</label>
                    <input type="text" class="form-control" id="exam_code" placeholder="Enter exam code">
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" id="subject" placeholder="Enter subject">
                </div>
                <div class="form-group">
                    <label for="teacher">Teacher:</label>
                    <input type="text" class="form-control" id="teacher" placeholder="Enter teacher's name">
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" class="form-control" id="department" placeholder="Enter department">
                </div>
                <div class="form-group">
                    <label for="exam_type">Exam Type:</label>
                    <select class="form-control" id="exam_type">
                        <option>Written</option>
                        <option>Oral</option>
                        <option>Practical</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exam_date">Exam Date:</label>
                    <input type="date" class="form-control" id="exam_date">
                </div>
                <div class="form-group">
                    <label for="exam_time">Exam Time:</label>
                    <input type="text" class="form-control" id="exam_time" placeholder="Enter exam time">
                </div>
                <div class="form-group">
                    <label for="duration">Duration:</label>
                    <input type="text" class="form-control" id="duration" placeholder="Enter exam duration">
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" placeholder="Enter exam location">
                </div>
                <div class="form-group">
                    <label for="max_marks">Max Marks:</label>
                    <input type="number" class="form-control" id="max_marks" placeholder="Enter max marks">
                </div>
                <div class="form-group">
                    <label for="passing_marks">Passing Marks:</label>
                    <input type="number" class="form-control" id="passing_marks" placeholder="Enter passing marks">
                </div>
                <div class="form-group">
                    <label for="instructions">Instructions:</label>
                    <textarea class="form-control" id="instructions" rows="3" placeholder="Enter exam instructions"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status">
                        <option>Scheduled</option>
                        <option>Completed</option>
                        <option>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

        <div class="col-md-8 border">
            <h2>Exam List</h2>
            <input type="text" class="form-control mb-3" placeholder="Search by exam name or code">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Exam Name</th>
                        <th>Subject</th>
                        <th>Teacher</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    <tr>
                        <td>1</td>
                        <td>Midterm Exam</td>
                        <td>Mathematics</td>
                        <td>Dr. Jane Doe</td>
                        <td>2024-05-15</td>
                        <td>10:00 AM - 12:00 PM</td>
                        <td>Room 101</td>
                        <td>Scheduled</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary btn-sm">Edit</button>
                                <button type="button" class="btn btn-outline-primary btn-sm">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <!-- More rows as needed -->
                </tbody>
            </table>
            <!-- Pagination Controls -->
            {{-- <nav>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav> --}}
        </div>
    </div>
</div>