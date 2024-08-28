<!-- Main Content-->
<?php if ($this->session->flashdata('login-success')) { ?>
    <script>
        swal({
            title: 'Well done!',
            text: 'Login success!',
            type: 'success',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
<?php } ?>
<div class="main-content side-content pt-0">

    <div class="container-fluid ">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-1">
                    <h4 class="main-content-title tx-30 text-white">Service Provider</h4>
                    <span class="text-white" style="font-size: 22px;padding-left:30px"><i class="fe fe-file-text"></i> Service Provider - Service Providers</span>
                </div>
            </div>
            <!-- End Page Header -->


            <div class="card">
                <div class="card-body">
                    <div class="">
                        <div class="float-left">
                            <h4>Service Provider</h4>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>contact Number 1</th>
                                    <th>Taluk</th>
                                    <th>District</th>
                                    <th>State</th>
                                    <th>Pincode</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                if ($services->num_rows() > 0) {
                                    foreach ($services->result() as $service) { ?>
                                        <tr>
                                            <th><?php echo $i; ?></th>
                                            <th><?php echo $service->centername ?></th>
                                            <th><?php echo $service->contact1 ?></th>
                                            <th><?php echo $service->staluk ?></th>
                                            <th><?php echo $service->sdistrict ?></th>
                                            <th><?php echo $service->sstate ?></th>
                                            <th><?php echo $service->spincode ?></th>
                                            <td><a href="<?php echo base_url('particularserviceprovider/' . $service->sid) ?>"><button class="btn ripple btn-success"><i class="fe fe-eye"></i></button></a>
                                            </td>
                                        </tr>
                                <?php $i++;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<!-- End Main Content-->



<script>
    $(document).ready(function() {
        $('#customDatatable').DataTable({
            paging: false,
            ordering: false,
            info: false,
            dom: 'Bfrtip',
            sizeof: 'A4',
            searching: false,
            sort: true,
            // "scrollY": 100,
            "scrollX": true,
            "scrollCollapse": true,
            "fixedHeader": true,
            "bInfo": false,
            scrollResize: true,
            lengthChange: false,
            searching: false,
            paging: false,

            columnDefs: [{
                orderable: true,
                className: 'select-checkbox',
                targets: 0
            }],
            select: {
                style: 'multi',
                selector: 'td:first-child'
            },
            buttons: [

                // {
                //     extend: 'excelHtml5',
                //     exportOptions: {
                //         columns: [0, 1, 2, 3, 4, 5, 6, 7]
                //     },

                //     orientation: 'landscape',
                //     pageSize: 'legal',
                //     title: '',
                // },
                // {
                //     extend: 'csvHtml5',
                //     exportOptions: {
                //         columns: [0, 1, 2, 3, 4, 5, 6, 7]
                //     },
                //     orientation: 'landscape',
                //     pageSize: 'legal',
                //     title: '',
                // },
                // {
                //     extend: 'pdfHtml5',
                //     exportOptions: {
                //         columns: [0, 1, 2, 3, 4, 5, 6, 7]
                //     },
                //     orientation: 'landscape',
                //     pageSize: 'legal',
                //     title: '',
                // },
            ]
        });
    });
</script>