<!-- Row -->
<div class="main-content side-content pt-0" style="margin-top: 20px">

    <div class="container-fluid">
        <div class="inner-body">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div>
                                <h6 class="main-content-label mb-3">Banners</h6>
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
                                            <th>Banners</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($banners)) foreach ($banners->result() as $row) { ?>
                                            <tr>
                                                <td>
                                                    <img class="zoom" src="<?php echo $row->bImage ?>" style="max-width:100px" />
                                                </td>

                                                <td>

                                                    <a href="<?php echo base_url('edit-banner/' . $row->bId) ?>">
                                                        <button class="btn ripple btn-success btn-sm"><i class=" ti-pencil-alt"></i>
                                                            Edit</button> </a>
                                                    <button onclick="setDeleteFunction('<?php echo $row->bId; ?>')" data-target="#deleteModal" data-toggle="modal" class="btn ripple btn-danger btn-sm"><i class="fe fe-trash"></i> Delete</button>

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
                            <h6 class="modal-title">Add Banner</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form id="addForm" enctype="multipart/form-data" action="<?php echo base_url('InterfaceController/addBanners') ?>" method="Post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="mg-b-10">Banner image</p>
                                        <input type="file" class="form-control" name="photo" id="photo" placeholder="Enter Name">
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


            <!-- Delete modal -->
            <div class="modal fade" id="deleteModal">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content modal-content-demo " style="border-radius:20px">

                        <form id="deleteForm" action="<?php echo base_url('InterfaceController/deleteBanners') ?>" method="Post">
                            <div class="modal-body">
                                <h2 class="text-center">
                                    <i class="fe fe-x-circle text-warning" style="font-size:60px"></i>
                                </h2>

                                <h3 class="mt-4 mb-3 text-warning text-center">Message Warning</h3>
                                <input type="hidden" name="dbId" id="dbId" />
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
            title: 'Form Failed to submit!',
            text: <?php echo $this->session->flashdata('error') ?>,
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
    function setDataFunction(bId, bImage, bDescription) {
        $('#ebId').val(bId);
        $('#ephoto').val(bImage);
        $('#editDescription').val(bDescription);
        $('.editModal').modal('show');
    }
</script>

<script>
    function setDeleteFunction(bId) {
        $('#dbId').val(bId);
        $('.deleteModal').modal('show');
    }
</script>
<script>
    $(document).ready(function() {
        $('#addForm').bootstrapValidator({
            fields: {
                photo: {
                    validators: {
                        notEmpty: {
                            message: 'Image is required'
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
                ephoto: {
                    validators: {
                        notEmpty: {
                            message: 'Image is required'
                        },
                    }
                },

            }
        }).on('success.form.bv', function(e) {
            $(this)[0].submit();
        });
    });
</script>