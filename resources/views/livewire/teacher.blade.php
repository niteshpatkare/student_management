<div class="container-fluid">
    <div class="row g-3">
        <!-- Form Section -->
        <div class="col-md-4 border">
            <h2>Add/Edit Teacher</h2>
            <form>
                <div class="form-group">
                    <label for="teach_name">Name:</label>
                    <input type="text" class="form-control" id="teach_name" placeholder="Enter teacher's full name">
                </div>
                <div class="form-group">
                    <label for="teach_email">Email:</label>
                    <input type="email" class="form-control" id="teach_email" placeholder="Enter teacher's email">
                </div>
                <div class="form-group">
                    <label for="teach_phone">Phone:</label>
                    <input type="text" class="form-control" id="teach_phone" placeholder="Enter teacher's phone number">
                </div>
                <div class="form-group">
                    <label for="teach_address">Address:</label>
                    <input type="text" class="form-control" id="teach_address" placeholder="Enter teacher's address">
                </div>
                <div class="form-group">
                    <label for="teach_qualification">Qualification:</label>
                    <input type="text" class="form-control" id="teach_qualification" placeholder="Enter teacher's qualifications">
                </div>
                <div class="form-group">
                    <label for="teach_department">Department:</label>
                    <select class="form-control" id="teach_department">
                        <option value="computer_science">Computer Science</option>
                        <option value="mathematics">Mathematics</option>
                        <option value="physics">Physics</option>
                        <option value="chemistry">Chemistry</option>
                        <!-- Add more departments as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="teach_subject">Subject:</label>
                    <select class="form-control" id="teach_subject">
                        <!-- Subjects related to Computer Science -->
                        <option value="programming">Programming</option>
                        <option value="data_structures">Data Structures</option>
                        <option value="algorithms">Algorithms</option>
                        <option value="web_development">Web Development</option>
                        <option value="databases">Databases</option>
                        <!-- Add more subjects as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="hire_date">Hire Date:</label>
                    <input type="date" class="form-control" id="hire_date">
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status">
                        <option>Active</option>
                        <option>On Leave</option>
                        <option>Retired</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

        <!-- Data Table Section -->
        <div class="col-md-8 border">
            <h2>Teacher List</h2>
            <input type="text" class="form-control mb-3" placeholder="Search by name or email">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
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
                    <!-- Example Row -->
                    <tr>
                        <td>1</td>
                        <td>Jane Doe</td>
                        <td>jane.doe@example.com</td>
                        <td>(123) 456-7890</td>
                        <td>Computer Science</td>
                        <td>Programming</td>
                        <td>Active</td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Pagination Controls -->
            <nav>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
