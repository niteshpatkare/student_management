<div>
    <div class="container-fluid ">
        <!-- Form Section -->
        <div class="row g-3 mt-5">
            <div class="col-md-3 p-4 bg-light bg-gradient">
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="selectexam">Select Exam</label>
                        <select class="form-control" id="selectexam" wire:model="exam_id">
                        
                            <option value="">Select Exam</option>
                            @if($exam_details)
                                @foreach($exam_details as $exam_detail)
                                <option value="{{$exam_detail->id}}">{{$exam_detail->exam_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectsubject">Select Subject</label>
                    
                        <select class="form-control" id="selectsubject" wire:model="sub_id">
                        
                            <option value="">Select Subject</option>
                            @foreach($sub_details as $sub_detail)
                            <option value="{{$sub_detail->id}}">{{$sub_detail->sub_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="selectstudent">Select Student</label>
                    
                        <select class="form-control" id="selectstudent" wire:model="stud__id">
                        
                            <option value="">Select Student</option>
                            @foreach($stud_details as $stud_detail)
                            <option value="{{$stud_detail->id}}">{{$stud_detail->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">
                            Add Exam
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
                            <th scope="col">Exam Name</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            
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
                if(data.status==1){
                    iziToast.info({
                        timeout:2000,
                        position: "topRight",
                        message: data.message,  // Accessing the message from the event data
                    });
                }
                if(data.status==2){
                    iziToast.success({
                        timeout:2000,
                        position: "topRight",
                        message: data.message,  // Accessing the message from the event data
                    });
                }
                if(data.status==3){
                    iziToast.success({
                        timeout:2000,
                        position: "topRight",
                        message: data.message,  // Accessing the message from the event data
                    });
                }

            });
        });
    </script>

    <script>
        window.addEventListener('show-delete-confirmation-subject', event => {
        //alert("Okay1");
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

        // function refreshTeacher(){
        //     @this.refreshTeacher();
        // }
    </script>
</div>
