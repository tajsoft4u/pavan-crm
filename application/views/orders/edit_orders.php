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
                    <h4 class="main-content-title tx-30 text-white">Orders</h4>
                    <span class="text-white" style="font-size: 22px;padding-left:30px"><i class="fe fe-shopping-bag"></i> Orders - Edit Orders</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">

                            <div class="">
                                <form id="addForm" action="<?php echo base_url('updateorder') ?>" method="Post">
                                    <div class="modal-body">
                                        <input type="hidden" name="orderid" value="<?php echo $order->oid ?>">
                                        <div class="row">
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" placeholder="Order No" name="order_id" id="order_id" value="<?php echo $order->order_id ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="complaint_number" id="complaint_number" placeholder="Complain Number" value="<?php echo $order->complainnum ?>">
                                            </div>

                                            <div class="col-md-3 mb-2">
                                                <input type="date" class="form-control" name="camdate" id="camdate" value="<?php echo date('Y-m-d', strtotime($order->camdate)) ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="date" class="form-control" name="installdate" id="installdate" value="<?php echo date('Y-m-d', strtotime($order->installdate)) ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <select class="form-control select-lg select2-no-search" name="type" id="type">
                                                    <option selected="" disabled="">Select Type</option>
                                                    <option value="installatios" <?php if ($order->otype != '') {
                                                                                        echo ($order->otype == 'installatios') ? 'selected' : '';
                                                                                    } ?>>INSTLLATIOS</option>
                                                    <option value="services" <?php if ($order->status != '') {
                                                                                    echo ($order->status == 'services') ? 'selected' : '';
                                                                                } ?>>SERVICES</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Customer Name" value="<?php echo $order->customername ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="contact_number1" id="contact_number1" placeholder="Contact Number 1" value="<?php echo $order->contactone ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="contact_number2" id="contact_number2" placeholder="Contact Number 2" value="<?php echo $order->contacttwo ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo $order->city ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="state" id="state" placeholder="State" value="<?php echo $order->state ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" value="<?php echo $order->pincode ?>" onblur="getInputValue(this)">
                                            </div>

                                            <div class="col-md-3 mb-2">
                                                <select class="form-control select-lg select2-no-search" name="model" id="model">
                                                    <option disabled="" selected="">Select Model</option>
                                                    <?php foreach ($product->result() as $key => $row) { ?>
                                                        <option value="<?php echo $row->prd_id ?>" <?php echo $row->prd_id == $order->modle ? 'selected' : '' ?> style="text-transform: uppercase;"><?php echo $row->prd_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 mb-2">
                                                <select class="form-control select-lg select2-no-search" name="status" id="status">
                                                    <option selected="" disabled="">Select Status</option>
                                                    <option value="new" <?php if ($order->status != '') {
                                                                            echo ($order->status == 'new') ? 'selected' : '';
                                                                        } ?>>NEW</option>
                                                    <option value="completed" <?php if ($order->status != '') {
                                                                                    echo ($order->status == 'completed') ? 'selected' : '';
                                                                                } ?>>COMPLETED</option>
                                                    <option value="pending" <?php if ($order->status != '') {
                                                                                echo ($order->status == 'pending') ? 'selected' : '';
                                                                            } ?>>Pending</option>
                                                </select>

                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <textarea rows="2" type="text" onkeyup="textAreaAdjust(this)" style="overflow:hidden" class="form-control" name="customer_address" id="customer_address" placeholder="Customer Address"><?php if ($order->address != '') echo $order->address ?></textarea>
                                            </div>

                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-3 mb-2">
                                                <select class="form-control select-lg select2-no-search" name="service_provider" id="service_provider" onchange="getDroopdownValue(this)">
                                                    <? foreach ($service->result() as $key => $row) { ?>
                                                        <option value="<?php echo $row->sid ?> " <?php if ($order->serviceprovider != '') {
                                                                                                        echo ($order->serviceprovider == $row->sid) ? 'selected' : '';
                                                                                                    } ?>><?php echo $row->centername ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="service_contact_number1" id="service_contact_number1" placeholder="Contact Number 1" value="<?php echo $order->sconatct1 ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="service_contact_number2" id="service_contact_number2" placeholder="Contact Number 2" value="<?php echo $order->scontact2 ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <textarea rows="2" type="text" onkeyup="textAreaAdjust(this)" style="overflow:hidden" class="form-control" name="service_provider_address" id="service_provider_address" placeholder="Service Provider Address"><?php echo $order->saddress ?></textarea>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="service_city" id="service_city" placeholder="City" value="<?php echo $order->scity ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="service_state" id="service_state" placeholder="State" value="<?php echo $order->sstate ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="service_pincode" id="service_pincode" placeholder="Pincode" value="<?php echo $order->spincode ?>">
                                            </div>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" placeholder="Amount Paid" name="amount_paid" id="amount_paid" value="<?php echo $order->amount ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="paid_by" id="paid_by" placeholder="Paid By" value="<?php echo $order->paidby ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="raw_tds" id="raw_tds" placeholder="RAW TDS" value="<?php echo $order->rawtds ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="pure_tds" id="pure_tds" placeholder="PURE TDS" value="<?php echo $order->puretds ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="extra_item" id="extra_item" placeholder="Extra Item" value="<?php echo $order->extraitem ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="extra_item_cost" id="extra_item_cost" placeholder="Extra Item Cost" value="<?php echo $order->extraitemcost ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="feedback" id="feedback" placeholder="Feedback" value="<?php echo $order->feedback ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="problem" id="problem" placeholder="Problem" value="<?php echo $order->problem ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="promotion_kit_given" id="promotion_kit_given" placeholder="Promotion Kit Given">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="order_source" id="order_source" placeholder="Order Source" value="<?php echo $order->ordersource ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="fst_service" id="1st_service" placeholder="1st Service" value="<?php echo $order->firstservice ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="snd_service" id="2nd_service" placeholder="2nd Service" value="<?php echo $order->secondservice ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <input type="text" class="form-control" name="trd_service" id="3rd_service" placeholder="3rd Service" value="<?php echo $order->thirdservice ?>">
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

<?php if ($this->session->flashdata('update')) { ?>
    <Script>
        swal({
            title: 'Well done!',
            text: '<?php echo $this->session->flashdata('update') ?>',
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