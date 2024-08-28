<!-- Row -->
<div class="main-content side-content pt-0" style="margin-top: 20px">

    <div class="container-fluid">
        <div class="inner-body">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div>
                                <h6 class="main-content-label mb-3">User List</h6>
                                <div class="d-flex flex-row justify-content-end mg-b-20">
                                    <a data-target="#addModal" data-toggle="modal">
                                        <button class="btn ripple btn-primary ">Add</button>

                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($users)) foreach ($users->result() as $row) { ?>
                                            <tr>
                                                <td><?php echo $row->username ?></td>
                                                <td><?php echo $row->password ?></td>
                                                <td>

                                                    <button data-target="#editModal" data-toggle="modal" onclick="setDataFunction('<?php echo $row->authId; ?>','<?php echo $row->username; ?>',
														'<?php echo $row->password; ?>',
														)" class="btn ripple btn-success btn-sm"><i class="fe fe-edit"></i> Edit</button>
                                                    <button onclick="setDeleteFunction('<?php echo $row->authId; ?>')" data-target="#deleteModal" data-toggle="modal" class="btn ripple btn-danger btn-sm"><i class="fe fe-trash"></i> Delete</button>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Modal -->
            <div class="modal fade" id="addModal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Add User</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form id="addForm" action="<?php echo base_url('InterfaceController/addUser') ?>" method="Post">
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <p class="mg-b-10">Username</p>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter Name">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mg-b-10">Password</p>
                                        <input type="text" class="form-control" name="password" id="password" placeholder="Enter Name">
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-primary" type="submit">Submit</button>
                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Add  Modal -->

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Edit User</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form id="editForm" action="<?php echo base_url('InterfaceController/editUser') ?>" method="Post">
                            <div class="modal-body">
                                <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="editId" id="editId"/>
                                        <p class="mg-b-10">Username</p>
                                        <input type="text" class="form-control" name="eusername" id="eusername" placeholder="Enter Name">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mg-b-10">Password</p>
                                        <input type="text" class="form-control" name="epassword" id="epassword" placeholder="Enter Name">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-primary" type="submit">Submit</button>
                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--End  Modal -->

            <!-- Delete modal -->
            <div class="modal fade" id="deleteModal">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content modal-content-demo " style="border-radius:20px">

                        <form id="deleteForm" action="<?php echo base_url('InterfaceController/deleteUser') ?>" method="Post">
                            <div class="modal-body">
                                <h2 class="text-center">
                                    <i class="fe fe-x-circle text-warning" style="font-size:60px"></i>
                                </h2>

                                <h3 class="mt-4 mb-3 text-warning text-center">Message Warning</h3>
                                <input type="hidden" name="deleteId" id="deleteId" />
                                <p class="tx-14 text-center text-dark">Are you sure to delete this you won't recover it after delete</p>

                            </div>
                            <div class="text-center pb-3">
                                <button class="btn ripple btn-primary " type="submit">Yes</button>
                                <button class="btn ripple btn-danger " data-dismiss="modal" type="button">No</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- End Small Modal -->

        </div>
    </div>
</div>


<!-- Scripts -->

<!-- Page -->
<?php if ($this->session->flashdata('error')) { ?>
    <Script>
        swal({
            title: 'Error!',
            text: '<?php echo $this->session->flashdata('error') ?>',
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    </Script>
<?php } ?>
<?php if ($this->session->flashdata('success')) { ?>
    <Script>
        swal({
            title: 'Well done!',
            text: '<?php echo $this->session->flashdata('success') ?>',
            type: 'success',
            timer: 3000,
            showConfirmButton: false
        });
    </Script>
<?php } ?>
<?php if ($this->session->flashdata('update')) { ?>
    <Script>
        swal({
            title: 'Well done!',
            text: 'caste update successfully!',
            type: 'success',
            timer: 3000,
            showConfirmButton: false
        });
    </Script>
<?php } ?>
<?php if ($this->session->flashdata('delete')) { ?>
    <Script>
        swal({
            title: 'Well done!',
            text: 'caste deleted successfully!',
            type: 'success',
            timer: 3000,
            showConfirmButton: false
        });
    </Script>
<?php } ?>

<script>
    function setDataFunction(authId, username,password) {
        $('#editId').val(authId);
        $('#eusername').val(username);
        $('#epassword').val(password);
        $('.editModal').modal('show');
    }
</script>

<script>
    function setDeleteFunction(authId) {
        $('#deleteId').val(authId);
        $('.deleteModal').modal('show');
    }
</script>
<script>
    $(document).ready(function() {
        $('#addForm').bootstrapValidator({
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'The username is required'
                        },
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required'
                        },
                        stringLength: {
                            min: 6,
                            max: 10,
                            message: 'Password must be more than 5 and less than 17 characters long'
                        },
                    }
                },
                

            }
        }).on('success.form.bv', function(e) {
            $(this)[0].submit();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#editForm').bootstrapValidator({
            fields: {
                eusername: {
                    validators: {
                        notEmpty: {
                            message: 'The username is required'
                        },
                    }
                },
                epassword: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required'
                        },
                        stringLength: {
                            min: 6,
                            max: 10,
                            message: 'Password must be more than 5 and less than 17 characters long'
                        },
                    }
                },
                

            }
        }).on('success.form.bv', function(e) {
            $(this)[0].submit();
        });
    });
</script>