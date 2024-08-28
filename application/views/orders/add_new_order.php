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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">

                            <div class="">
                                <form id="addForm" action="<?php echo base_url('insertneworder') ?>" method="Post">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" placeholder="Order No" name="order_id" id="order_id">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="complaint_number" id="complaint_number" placeholder="Complain Number">
                                            </div>

                                            <div class="col-md-3 mb-2">
                                                <input onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Select CAM Date" name="camdate" id="camdate">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="installdate" id="installdate" placeholder="Select Install Date">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <select class="form-control select-lg select2-no-search" name="type" id="type">
                                                    <option selected="" disabled="">Select Type</option>
                                                    <option value="INSTALLATIONS">INSTALLATIONS</option>
                                                    <option value="SERVICES">SERVICES</option>
                                                </select>
                                            </div>

                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Customer Name">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="contact_number1" id="contact_number1" placeholder="Contact Number 1">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="contact_number2" id="contact_number2" placeholder="Contact Number 2">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="state" id="state" placeholder="State">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" onblur="getInputValue(this)">
                                            </div>

                                            <div class="col-md-3 mb-2">
                                                <select class="form-control select-lg select2-no-search" name="model" id="model">
                                                    <option disabled="" selected="">Select Model</option>
                                                    <?php foreach ($product->result() as $key => $row) { ?>
                                                        <option value="<?php echo $row->prd_name ?>"> <?php echo $row->prd_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <select class="form-control select-lg select2-no-search" name="status" id="status">
                                                    <option disabled="" selected="">Select Status</option>
                                                    <option value="NEW">NEW</option>
                                                    <option value="COMPLETED">COMPLETED</option>
                                                    <option value="PENDING">PENDING</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <textarea rows="2" type="text" onkeyup="textAreaAdjust(this)" style="overflow:hidden" class="form-control" name="customer_address" id="customer_address" placeholder="Customer Address"></textarea>
                                            </div>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="col-md-3 mb-2">
                                                <select class="form-control select-lg select2-no-search" name="service_provider" id="service_provider" onchange="getDroopdownValue(this)">
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="service_contact_number1" id="service_contact_number1" placeholder="Contact Number 1">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="service_contact_number2" id="service_contact_number2" placeholder="Contact Number 2">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <textarea rows="2" type="text" onkeyup="textAreaAdjust(this)" style="overflow:hidden" class="form-control" name="service_provider_address" id="service_provider_address" placeholder="Service Provider Address"></textarea>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="service_city" id="service_city" placeholder="City">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="service_state" id="service_state" placeholder="State">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="service_pincode" id="service_pincode" placeholder="Pincode">
                                            </div>
                                        </div>

                                        <div class="row mt-5">

                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" placeholder="Amount Paid" name="amount_paid" id="amount_paid">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="paid_by" id="paid_by" placeholder="Paid By">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="raw_tds" id="raw_tds" placeholder="RAW TDS">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="pure_tds" id="pure_tds" placeholder="PURE TDS">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="extra_item" id="extra_item" placeholder="Extra Item">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="extra_item_cost" id="extra_item_cost" placeholder="Extra Item Cost">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="feedback" id="feedback" placeholder="Feedback">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="problem" id="problem" placeholder="Problem">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="kitpurchasedue" id="purchasedue" placeholder="Kit Purchase Due">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <select class="form-control select-lg select2-no-search" name="promotion_kit_given" id="promotion_kit_given">
                                                    <option disabled="" selected="">Select Promotion Kit</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="order_source" id="order_source" placeholder="Order Source">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="fst_service" id="1st_service" placeholder="1st Service">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="snd_service" id="2nd_service" placeholder="2nd Service">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="trd_service" id="3rd_service" placeholder="3rd Service">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <button class="btn ripple btn-primary" type="submit">Submit</button>
                            <button class="btn ripple btn-secondary">Cancel</button>

                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

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
    function getInputValue(input) {
        var pincode = input.value;
        $.ajax({
            url: '<?php echo base_url('InterfaceController/getServicerProviderDetails') ?>',
            type: 'POST',
            data: {
                pincode: pincode
            },
            dataType: 'json',
            success: function(data) {

                var html = '<option selected="" disabled="">Select Service Provider</option>';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].sid + '">' + data[i].centername + '</option>';
                }
                $("#service_provider").html(html);
            }
        });
    }
</script>

<script>
    function getDroopdownValue(input) {
        var id = input.value;
        $.ajax({
            url: '<?php echo base_url('InterfaceController/getEachServicerProviderDetails') ?>',
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                const {
                    contact1,
                    contact2,
                    staluk,
                    sstate,
                    spincode
                } = data;
                $('#service_contact_number1').val(contact1);
                $('#service_contact_number2').val(contact2);
                $('#service_city').val(staluk);
                $('#service_state').val(sstate);
                $('#service_pincode').val(spincode);
            }
        });
    }
</script>
<script type="text/javascript">
    $('document').ready(function() {
        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#addForm').bootstrapValidator({
            fields: {
                order_id: {
                    validators: {
                        notEmpty: {
                            message: 'The order id is required'
                        },
                    }
                },
                complaint_number: {
                    validators: {
                        notEmpty: {
                            message: 'The complaint number is required'
                        },
                    }
                },
                installdate: {
                    validators: {
                        notEmpty: {
                            message: 'The install date  is required'
                        },
                    }
                },
                camdate: {
                    validators: {
                        notEmpty: {
                            message: 'The cam date  is required'
                        },
                    }
                },
                to_date: {
                    validators: {
                        notEmpty: {
                            message: 'The date number is required'
                        },
                    }
                },
                from_date: {
                    validators: {
                        notEmpty: {
                            message: 'The date is required'
                        },
                    }
                },

                type: {
                    validators: {
                        notEmpty: {
                            message: 'The type is required'
                        },
                    }
                },

                customer_name: {
                    validators: {
                        notEmpty: {
                            message: 'The customer name is required'
                        },
                    }
                },

                contact_number1: {
                    validators: {
                        notEmpty: {
                            message: 'The contact number1 is required'
                        },
                    }
                },

                model: {
                    validators: {
                        notEmpty: {
                            message: 'The modle is required'
                        },
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'The status is required'
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

                customer_address: {
                    validators: {
                        notEmpty: {
                            message: 'The customer address is required'
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