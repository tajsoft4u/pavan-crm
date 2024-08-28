<!-- Row -->
<div class="main-content side-content pt-0" style="margin-top: 20px">
    <style>
        input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }
    </style>
    <div class="container-fluid">
        <div class="inner-body">
            <div class="page-header">
                <div class="page-header-1">
                    <h4 class="main-content-title tx-30 text-white">Service Provider</h4>
                    <span class="text-white" style="font-size: 22px;padding-left:30px"><i class="fe fe-file-text"></i> Service Provider - Add New Provider</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">

                            <!-- <div>
                                <form method="post" action='<?php echo base_url('ServiceProvider/importServiceProvider') ?>' enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="mg-b-10">Select File</p>
                                                <input type="file" class="form-control" name="file" id="photo" placeholder="Enter Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn ripple btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div> -->

                            <div class="pt-2">

                                <form id="addForm" action="<?php echo base_url('insertserviceprovider') ?>" method="Post">
                                    <div class="modal-body">
                                        <div class="row mt-2">
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" placeholder="Service Provider Name" name="service_provider_name" id="service_provider_name">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="contact_number1" id="contact_number1" placeholder="Contact Number 1">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="contact_number2" id="contact_number2" placeholder="Contact Number 2">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <textarea rows="2" type="text" onkeyup="textAreaAdjust(this)" style="overflow:hidden" class="form-control" name="service_provider_address" id="service_provider_address" placeholder="Service Provider Address"></textarea>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="district" id="district" placeholder="District">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="state" id="state" placeholder="State">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" placeholder="Service Center Name" name="service_center_name" id="service_center_name">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="service_center_details" id="service_center_details" placeholder="Service Center Details">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="gstin" id="gstin" placeholder="GSTIN">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <button class="btn ripple btn-success" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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


<script>
    $(document).ready(function() {
        $('#addForm').bootstrapValidator({
            fields: {
                service_center_name: {
                    validators: {
                        notEmpty: {
                            message: 'The service center name is required'
                        },
                    }
                },
                contact_number1: {
                    validators: {
                        notEmpty: {
                            message: 'The container number 1 is required'
                        },
                    }
                },
                city: {
                    validators: {
                        notEmpty: {
                            message: 'The city is required'
                        },
                    }
                },
                state: {
                    validators: {
                        notEmpty: {
                            message: 'The state is required'
                        },

                    }
                },
                pincode: {
                    validators: {
                        notEmpty: {
                            message: 'The pincode is required'
                        },

                    }
                },
            }
        }).on('success.form.bv', function(e) {
            $(this)[0].submit();
        });
    });
</script>
<script type="text/javascript">
    $('document').ready(function() {
        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });
    });
</script>
<script>
    function textAreaAdjust(element) {
        element.style.height = "1px";
        element.style.height = (25 + element.scrollHeight) + "px";
    }
</script>