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

        .centerdiv {
            margin: auto;
            width: 100px;
            border: 1px solid;
            background-color: grey;
            padding: 10px;
            text-align: center;
            height: 100px;
            line-height: 80px;
            border-radius: 100px;
        }

        .textcontent {
            width: 100px;
            height: 100px;
            line-height: 100px;
            border-radius: 50%;
            font-size: 50px;
            color: #fff;
            text-align: center;
            background: #000;
            align-self: center;
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">

                            <div class="">
                                <form id="addForm" action="#" method="Post">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4 border-gray" style="border: 0.5px solid;padding:10px;border-radius:20px">
                                                <div class="container-fluid">
                                                    <div class="col-auto align-self-center mt-2">
                                                        <div class="centerdiv">
                                                            Aavtar
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <h6>Name :</h6><?php echo $service->sname; ?>
                                                    </div>
                                                    <div class="row">
                                                        <h6>Contact 1</h6> : <?php echo $service->contact1; ?>
                                                    </div>
                                                    <div class="row">
                                                        <h6>Contact 2</h6> : <?php echo $service->contact2; ?>
                                                    </div>
                                                    <div class="row">
                                                        <h6>Contact 3</h6> : <?php echo $service->contact3; ?>
                                                    </div>
                                                    <div class="row">
                                                        <h6>Address</h6> : <?php echo $service->details; ?>
                                                    </div>
                                                    <div class="row">
                                                        <h6>Taluk</h6> : <?php echo $service->staluk; ?>
                                                    </div>
                                                    <div class="row">
                                                        <h6>District</h6> : <?php echo $service->sstate; ?>
                                                    </div>
                                                    <div class="row">
                                                        <h6>State</h6> : <?php echo $service->sstate; ?>
                                                    </div>
                                                    <div class="row">
                                                        <h6>Pincode</h6> : <?php echo $service->spincode; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="">Pending Orders</div>
                                                                        <div class="h4 mt-2 mb-2"><b>
                                                                                <?php $count = $this->db->where('pincode', $service->spincode)->where('status', 'PENDING')->get('orders');
                                                                                echo $count->num_rows()
                                                                                ?>
                                                                            </b></div>
                                                                    </div>
                                                                    <div class="col-auto align-self-center ">
                                                                        <div class="feature-1 mt-0 mb-0"> <i class="fa fa-file-alt  project bg-light-green text-white "></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="">Orders Completed</div>
                                                                        <div class="h4 mt-2 mb-2"><b>
                                                                                <?php $count = $this->db->where('pincode', $service->spincode)->where('status', 'COMPLETED')->get('orders');
                                                                                echo $count->num_rows()
                                                                                ?>
                                                                            </b>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto align-self-center ">
                                                                        <div class="feature-1 mt-0 mb-0"> <i class="fe fe-box  project bg-dark-red text-white "></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="<?php echo base_url('editserviceproviders/' . $service->sid) ?>"><button class="btn ripple btn-purple" type="button">Edit Details</button></a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
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