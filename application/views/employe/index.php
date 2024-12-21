<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <h3>Employee List</h3>
        <div class="alert alert-success mt-2" style="display:none;"></div>

        <button class="btn btn-success mt-2 mb-3" id="addbtn">Add Emp</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Address</th>
                    <th>Phone No.</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="showdata">

            </tbody>
        </table>
    </div>

    <!-- Insert Modal -->
    <div id="insertmodal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">My Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myform" action="" method="post">
                        <!-- <label for="empid">Employee ID:</label>
                        <input type="text" class="form-control" id="empid" name="empid" placeholder="Enter Employee ID">
                        <br> -->
                        <label for="empname">Employee Name:</label>
                        <input type="text" class="form-control" id="empname" name="empname"
                            placeholder="Enter Employee Name">
                        <br>
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                        <br>
                        <label for="phone">Phone No:</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone No">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveButton">Save</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Delete Modal -->
    <div id="deleteModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <p>Do you want to delete this employee record?</p>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="deletebtn" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            showallEmployee();

            // insert modal show 
            $('#addbtn').click(function () {
                $('#insertmodal').modal('show');
                $('#insertmodal').find('.modal-title').text("Add New Employee");
                $('#myform').attr('action', '<?php echo base_url() ?>Employe/addEmployee');
            });

            // Save Button Click
            $('#saveButton').click(function () {
                var url = $('#myform').attr('action');
                var data = $('#myform').serialize(); // Serialize form data
                var empid = $('input[name=empid]');
                var empName = $('input[name=empname]');
                var empAddress = $('input[name=address]');
                var phone = $('input[name=phone]');
                var isValid = true;

                // Validation
                // if (empid.val().trim() === '') {
                //     empid.addClass('is-invalid');
                //     isValid = false;
                // } else {
                //     empid.removeClass('is-invalid');
                // }

                if (empName.val().trim() === '') {
                    empName.addClass('is-invalid');
                    isValid = false;
                } else {
                    empName.removeClass('is-invalid');
                }

                if (empAddress.val().trim() === '') {
                    empAddress.addClass('is-invalid');
                    isValid = false;
                } else {
                    empAddress.removeClass('is-invalid');
                }
                if (phone.val().trim() === '') {
                    phone.addClass('is-invalid');
                    isValid = false;
                } else {
                    phone.removeClass('is-invalid');
                }

                // AJAX Call
                if (isValid) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: data,
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                $('#insertmodal').modal('hide');
                                $('#myform')[0].reset();
                                var type = response.type === 'add' ? 'added' : 'updated';
                                $('.alert-success').text('Employee ' + type + ' successfully').fadeIn().delay(5000).fadeOut('slow');
                                showallEmployee(); // Refresh Employee List
                            } else {
                                alert('Error: Could not save data.');
                            }
                        },
                        error: function () {
                            alert('Error: Failed to connect to the server.');
                        }
                    });
                }
            });
        });


        function showallEmployee() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>Employe/showAllEmployee',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html +=
                            '<tr>' +
                            '<td>' + (i+1) + '</td>' +
                            '<td>' + data[i].employe_id + '</td>' +
                            '<td>' + data[i].employe_name + '</td>' +
                            '<td>' + data[i].employe_address + '</td>' +
                            '<td>' + data[i].employe_phoneno + '</td>' +
                            '<td>' +
                            '<a class="btn btn-primary mr-1 item-edit" href="javascript:;" data="' + data[i].employe_id + '">Edit</a>' +
                            '<a class="btn btn-danger item-delete" href="javascript:;" data-id="' + data[i].employe_id + '">Delete</a>'
                            + '</td>' +
                            '</tr>';
                    }
                    $('#showdata').html(html);
                },
                error: function () {
                    alert('Error');
                }
            });
        }

        // Edit Modal Show 
        $("#showdata").on('click', '.item-edit', function () {
            var id = $(this).attr('data');
            $('#insertmodal').modal('show');
            $('#insertmodal').find('.modal-title').text("Edit Employee");
            $('#myform').attr('action', '<?php echo base_url() ?>Employe/updateEmployee');

            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>Employe/editEmployee',
                data: { id: id },
                dataType: 'json',
                success: function (data) {
                    
                    $('input[name=empid]').val(data.employe_id);
                    $('input[name=empname]').val(data.employe_name);
                    $('input[name=address]').val(data.employe_address);
                    $('input[name=phone]').val(data.employe_phoneno);
                },
                error: function () {
                    alert('Error fetching employee data');
                }
            });
        });

        


        // Delete modal show 
        $("#showdata").on('click', '.item-delete', function () {
            var id = $(this).data('id');
            console.log(id);
            $('#deleteModal').modal('show');
            $("#deletebtn").off('click').on('click', function () {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url() ?>/Employe/deleteEmployee',
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            console.log(response);
                            $('#deleteModal').modal('hide');
                            $('.alert-success').text('Employee deleted successfully').fadeIn().delay(5000).fadeOut();
                            showallEmployee();

                        } else {
                            alert("Error");
                        }

                    },
                    error: function () {
                        alert('Error deleting employee');
                    }
                });
            });
        });
    </script>
</body>

</html>