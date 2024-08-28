<div class="main-content side-content pt-0" style="margin-top: 20px">
    <div class="container-fluid">
        <div class="inner-body">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Reset Password</h1>
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <form id="addForm" action="<?php echo base_url('Auth/checkPassword') ?>" method="Post">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <label>Old Password</label>
                                        <input type="text" class="form-control" id="old_password" name="old_password">
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <label>New password</label>
                                        <input type="text" class="form-control" id="new_password" minlength="6" name="new_password">
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <label>Confirm Password</label>
                                        <input type="text" class="form-control" id="confirm_password" minlength="6" name="confirm_password">
                                    </div>
                                </div>
                                <button class="btn ripple btn-primary mg-t-10" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($this->session->flashdata('error')) { ?>
    <script>
        swal({
            title: 'Error!',
            text: ' <?php echo $this->session->flashdata('error') ?>',
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
<?php } ?>

<script>
    $(document).ready(function() {
        $('#addForm').bootstrapValidator({
            fields: {
                old_password: {
                    validators: {
                        notEmpty: {
                            message: 'old password is required'
                        },
                    }
                },
                new_password: {
                    validators: {
                        notEmpty: {
                            message: 'new password is required'
                        },
                        stringLength: {
                            min: 6,
                            max: 10,
                            message: 'Password must be more than 5 and less than 17 characters long'
                        },
                    }
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message: 'confirm is required'
                        },
                        identical: {
                            field: 'new_password',
                            message: 'The confirm password did not match'
                        }
                    }
                },
            }
        }).on('success.form.bv', function(e) {
            $(this)[0].submit();
        });
    });
</script>