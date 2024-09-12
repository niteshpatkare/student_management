<div>
    <div class="container">
        <!-- Added 'g-3' to the row for gap between columns -->
        <div class="row g-3">
            <div class="col-md-4 border">
                <form>
                    <div class="form-group">
                        <label for="name">Student name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile no:</label>
                        <input type="tel" class="form-control" id="mobile" placeholder="Enter mobile number" name="mobile">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="button">Submit</button>
                    </div>
                    
                </form>
            </div>

            <div class="col-md-8 border">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
