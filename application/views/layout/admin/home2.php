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
<!-- Main Content-->
<?php if ($this->session->flashdata('warning')) { ?>
    <script>
        swal({
            title: 'Well done!',
            text: <?php $this->session->flashdata('warning') ?>,
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
<?php } ?>

<style>
    #myDIV {
        display: none;
    }
</style>
<div class="main-content side-content pt-0">

    <div class="container-fluid ">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-1">
                    <h4 class="main-content-title tx-30 text-white">HOME</h4>
                    <span class="text-white" style="font-size: 22px;padding-left:30px"><i class="fe fe-home"></i> Home - Dashboard</span>
                </div>
            </div>
            <!-- End Page Header -->


            <!-- ORDER COUNT -->
            <div class="row ">
                <div class="col">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="">Pending Orders</div>
                                            <div class="h4 mt-2 mb-2"><b>
                                                    <?php $pending = $this->db->where('status', 'pending')->get('orders');
                                                    echo $pending->num_rows() ?>
                                                </b></div>
                                        </div>
                                        <div class="col-auto align-self-center ">
                                            <div class="feature-1 mt-0 mb-0"> <i class="fa fa-file-alt project bg-light-green  text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="">Orders Completed</div>
                                            <div class="h4 mt-2 mb-2"><b> <?php $pending = $this->db->where('status', 'completed')->get('orders');
                                                                            echo $pending->num_rows() ?></b></div>
                                        </div>
                                        <div class="col-auto align-self-center ">
                                            <div class="feature-1 mt-0 mb-0"> <i class="fe fe-box   project bg-dark-red text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW- END -->
            <div class="card">
                <div class="card-body">
                    <!-- <form>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label>Search Service Center</label>
                                <input class="form-control" name="name" value='<?php echo $this->input->get('name') ?>' />
                            </div>
                            <div class="col-md-2">
                                <p>Search</p>
                                <button class="btn" type="submit" style="border-radius:3px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27.506" height="27.746" viewBox="0 0 30.506 30.746">
                                        <g id="Group_176" data-name="Group 176" transform="translate(-381.47 -21.657)">
                                            <g id="search" transform="translate(382.47 22.657)" opacity="0.8">
                                                <circle id="Ellipse_342" data-name="Ellipse 342" cx="12.5" cy="12.5" r="12.5" fill="none" stroke="#172b4d" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <line id="Line_11" data-name="Line 11" x1="6.789" y1="6.789" transform="translate(21.303 21.543)" fill="none" stroke="#172b4d" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                                <a href="<?php echo base_url('home') ?>">
                                    <button class="btn btn-primary ripple" type="button" style="border-radius:3px">
                                        Reset
                                    </button>
                                </a>

                            </div>
                        </div>
                    </form> -->

                    <form method="post" action="<?php echo base_url('exportorder') ?>">
                        <div class="">
                            <div class="float-left">
                                <h4>Order Data</h4>
                            </div>
                            <div class="float-right">

                                <button aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" id="dropdownMenuButton" class="dropdown dropup btn ripple btn-outline-sky-blue" type="button" style="border-radius:3px">Bulk Action</button>
                                <ul class="dropdown-menu multi-level" aria-labelledby="dLabel">
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item" data-target="#camDateModal" data-toggle="modal"><i class="fe fe-edit text-light-purple" style="font-size:18px"></i> Filter By CAM Date</a>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item" data-target="#installDateModal" data-toggle="modal"><i class="fe fe-phone-call" style="font-size:18px;color:#F53C56"> </i> Filter By Install Date</a>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" class="dropdown-item"><i class="fe fe-settings" style="font-size:18px;color:#FB8266"> </i> Filter By Product</a>
                                        <ul class="dropdown-menu">
                                            <?php if (!empty($product)) foreach ($product->result() as $row) { ?>
                                                <li><a class="dropdown-item" onclick="filterByProduct('<?php echo $row->prd_name ?>')"><?php echo $row->prd_name ?> </a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" class="dropdown-item"><i class="fe fe-bell" style="font-size:18px;color:#FB8266"> </i> Filter By Service Provider</a>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" class="dropdown-item"><i class="fe fe-bell" style="font-size:18px;color:#FB8266"> </i> Filter By Status</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" onclick="filterByStatus('pending')"> <?php $color = $this->Constant_Model->getStatusColors('pending');
                                                                                                                echo $color ?> Pending</a></li>
                                            <li><a class="dropdown-item" onclick="filterByStatus('completed')"><?php $color = $this->Constant_Model->getStatusColors('completed');
                                                                                                                echo $color ?> Completed</a></li>

                                        </ul>
                                    </li>
                                </ul>


                                <button class="btn" type="button" style="border-radius:3px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.748" height="25.332" viewBox="0 0 29.748 28.332">
                                        <g id="filter" transform="translate(-394 -239)">
                                            <path id="Path_491" data-name="Path 491" d="M402.235,263.79a2.834,2.834,0,0,1,5.488,0H423.04a.706.706,0,0,1,.288.061.718.718,0,0,1,.225.159.709.709,0,0,1-.509,1.2H407.723a2.834,2.834,0,0,1-5.488,0h-7.526a.7.7,0,0,1-.244-.043.708.708,0,0,1-.269-1.154.719.719,0,0,1,.225-.159.706.706,0,0,1,.288-.061Zm2.744-.708a1.417,1.417,0,1,1-1.417,1.417A1.417,1.417,0,0,1,404.979,263.082Zm8.589-10.624a2.834,2.834,0,0,1,5.488,0h3.985a.706.706,0,0,1,.288.061.718.718,0,0,1,.225.159.708.708,0,0,1-.509,1.2h-3.989a2.834,2.834,0,0,1-5.488,0H394.708a.706.706,0,0,1-.288-.061.719.719,0,0,1-.225-.159.708.708,0,0,1,.269-1.154.7.7,0,0,1,.244-.043Zm2.744-.708a1.417,1.417,0,1,1-1.417,1.417A1.417,1.417,0,0,1,416.311,251.749Zm-18.681-10.624a2.834,2.834,0,0,1,5.488,0H423.04a.706.706,0,0,1,.288.061.718.718,0,0,1,.225.159.709.709,0,0,1-.509,1.2H403.119a2.834,2.834,0,0,1-5.488,0h-2.922a.7.7,0,0,1-.244-.043.708.708,0,0,1,.244-1.373Zm2.744-.708a1.417,1.417,0,1,1-1.417,1.417A1.417,1.417,0,0,1,400.375,240.417Z" fill="#455570" fill-rule="evenodd" />
                                        </g>
                                    </svg>
                                </button>
                                <a data-target="#addModal" data-toggle="modal"><button class="btn ripple btn-outline-orange" type="button" style="border-radius:3px">Import Data</button></a>
                                <button class="btn ripple btn-outline-purple" style="border-radius:3px">Export Data</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="customDatatable" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th><label class="ckbox"><input type="checkbox" value="1" id="example-select-all" class="select-checkbox"><span></span></label></th>
                                        <th>Cam Date</th>
                                        <th>Install Date</th>
                                        <th>Complaint No</th>
                                        <th>Product</th>
                                        <th>Type</th>
                                        <th>STATUS</th>
                                        <th>Customer Name</th>
                                        <th>Order No</th>
                                        <th>CONTACT NO</th>
                                        <th>CONTACT NO</th>
                                        <th>Address</th>
                                        <th>Address 1</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Pincode</th>
                                        <th>SERVICE CENTER</th>
                                        <th>CONTACT</th>
                                        <th>CONTACT</th>
                                        <th>PAID</th>
                                        <th>AMOUNT PAID </th>
                                        <th>RAW TDS</th>
                                        <th>PURE TDS</th>
                                        <th>EXTRA ITEM</th>
                                        <th>FEEDBACK </th>
                                        <th>PROBLEM</th>
                                        <th>1st SERVICE</th>
                                        <th>2nd SERVICE</th>
                                        <th>3rd SERVICE</th>
                                        <th>KIT PURCHASE DUE</th>
                                        <th>PROMOTION KIT GIVEN</th>
                                        <th>Data Source</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($orders->num_rows() > 0) {
                                        foreach ($orders->result() as $order) { ?>
                                            <tr>
                                                <td><label class="ckbox"><input type="checkbox" name="orderselect[]" value="<?php echo $order->oid; ?>" id="checkd"><span></span></label></td>
                                                <td><?php echo date('Y-M-d', strtotime($order->camdate)) ?></td>
                                                <td><?php echo date('y-M-d', strtotime($order->installdate)) ?></td>
                                                <td><?php echo $order->complainnum ?></td>
                                                <td><?php echo strtoupper($order->modle) ?></td>
                                                <td><?php echo strtoupper($order->otype) ?></td>
                                                <td>
                                                    <?php $value = strtolower($order->status);
                                                    $color = $this->Constant_Model->getStatusColors($value);
                                                    echo $color . ' ' . $order->status;
                                                    ?>
                                                </td>

                                                <td><?php echo $order->customername ?></td>
                                                <th><?php echo $order->order_id ?></th>
                                                <td><?php echo $order->contactone ?> </td>
                                                <td><?php echo $order->contacttwo ?> </td>
                                                <td><?php echo wordwrap($order->address, 40, "<br />\n") ?></td>
                                                <td><?php echo wordwrap($order->address2, 40, "<br />\n") ?></td>
                                                <td><?php echo $order->city ?></td>
                                                <td><?php echo $order->state ?></td>
                                                <td><?php echo $order->pincode ?></td>
                                                <td><?php echo $order->serviceprovider ?></td>
                                                <td><?php echo $order->sconatct1 ?></td>
                                                <td><?php echo $order->scontact2 ?></td>
                                                <td><?php echo $order->paidby ?></td>
                                                <td><?php echo $order->amount ?> </td>
                                                <td><?php echo $order->rawtds ?></td>
                                                <td><?php echo $order->puretds ?></td>
                                                <td><?php echo $order->extraitem ?></td>
                                                <td><?php echo $order->feedback ?> </td>
                                                <td><?php echo $order->problem ?></td>
                                                <td><?php echo $order->firstservice ?></td>
                                                <td><?php echo $order->secondservice ?></td>
                                                <td><?php echo $order->thirdservice ?></td>
                                                <td><?php echo $order->kitpurchasedue ?></td>
                                                <td><?php echo $order->promotionkit ?></td>
                                                <td><?php echo $order->ordersource ?></td>
                                                <td>
                                                    <div class="dropdown dropright"> <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-light dropdown-toggle" data-toggle="dropdown" id="droprightMenuButton" type="button"><i class="fe fe-more-vertical"></i></button>
                                                        <div aria-labelledby="droprightMenuButton" class="dropdown-menu tx-13" style="border-radius:20px;padding:5px">
                                                            <a class="dropdown-item" href="<?php echo base_url('editorders/' . $order->oid) ?>" style="font-size: 16px;"><i class="fe fe-edit" style="font-size:18px;color:#7764E4"> </i>Edit</a>


                                                            <li class="dropdown-submenu"><a class="dropdown-item" href="#" style="font-size: 16px;"><i class="fe fe-phone-call" style="font-size:18px;color:#F53C56"> </i>Contact Customer</a>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="tel:<?php echo $order->contactone ?>">
                                                                            <i class="fe fe-phone-call" style="font-size:18px;color:#F53C56"> </i><?php echo $order->contactone ?>
                                                                        </a></li>
                                                                    <li><a class="dropdown-item" target="_blank" href="//api.whatsapp.com/send?phone=+<?php echo $order->contactone ?>&text=hi">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20.479" height="20.55" viewBox="0 0 16.479 16.55">
                                                                                <g id="whatsapp" transform="translate(0 0.001)">
                                                                                    <path id="Path_500" data-name="Path 500" d="M.352,16.55a.352.352,0,0,1-.34-.445l1.076-3.929a8.207,8.207,0,1,1,7.184,4.238h0a8.223,8.223,0,0,1-3.8-.932L.442,16.538a.354.354,0,0,1-.089.011Zm0,0" transform="translate(0)" fill="#e5e5e5" />
                                                                                    <path id="Path_501" data-name="Path 501" d="M10.894,26.741l1.114-4.069a7.855,7.855,0,1,1,6.806,3.933h0a7.848,7.848,0,0,1-3.753-.956Zm4.356-2.513.239.141a6.519,6.519,0,0,0,3.323.91h0a6.528,6.528,0,1,0-5.53-3.059l.155.247-.66,2.408Zm0,0" transform="translate(-10.542 -10.543)" fill="#fff" />
                                                                                    <path id="Path_502" data-name="Path 502" d="M19.344,34.681l1.076-3.928a7.582,7.582,0,1,1,6.57,3.8h0a7.581,7.581,0,0,1-3.623-.923Zm0,0" transform="translate(-18.718 -18.757)" fill="#64b161" />
                                                                                    <g id="Group_226" data-name="Group 226" transform="translate(0.352 0.352)">
                                                                                        <path id="Path_503" data-name="Path 503" d="M10.894,26.741l1.114-4.069a7.855,7.855,0,1,1,6.806,3.933h0a7.848,7.848,0,0,1-3.753-.956Zm4.356-2.513.239.141a6.519,6.519,0,0,0,3.323.91h0a6.528,6.528,0,1,0-5.53-3.059l.155.247-.66,2.408Zm0,0" transform="translate(-10.894 -10.895)" fill="#fff" />
                                                                                        <path id="Path_504" data-name="Path 504" d="M134.474,141.957c-.147-.327-.3-.333-.442-.339-.114,0-.245,0-.376,0a.721.721,0,0,0-.523.246,2.2,2.2,0,0,0-.687,1.637,3.817,3.817,0,0,0,.8,2.03,8.055,8.055,0,0,0,3.352,2.962c1.658.654,2,.524,2.355.491a1.982,1.982,0,0,0,1.325-.933,1.639,1.639,0,0,0,.115-.933c-.049-.082-.18-.131-.376-.229s-1.161-.573-1.341-.638-.311-.1-.442.1-.507.638-.621.769-.229.148-.425.049a5.366,5.366,0,0,1-1.578-.974,5.914,5.914,0,0,1-1.092-1.359c-.114-.2,0-.293.086-.4a5.921,5.921,0,0,0,.49-.671.362.362,0,0,0-.016-.344C135.03,143.316,134.648,142.345,134.474,141.957Zm0,0" transform="translate(-128.517 -137.388)" fill="#fff" fill-rule="evenodd" />
                                                                                    </g>
                                                                                </g>
                                                                            </svg> <?php echo $order->contactone ?>
                                                                        </a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="dropdown-submenu"><a class="dropdown-item" href="#" style="font-size: 16px;"><i class="fe fe-settings" style="font-size:18px;color:#40D6F2"> </i>Contact Service</a>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="tel:<?php echo $order->sconatct1 ?>">
                                                                            <i class="fe fe-phone-call" style="font-size:18px;color:#F53C56"> </i><?php echo $order->sconatct1 ?>
                                                                        </a></li>
                                                                    <li><a class="dropdown-item" target="_blank" href="//api.whatsapp.com/send?phone=+<?php echo $order->sconatct1 ?>&text=hi">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20.479" height="20.55" viewBox="0 0 16.479 16.55">
                                                                                <g id="whatsapp" transform="translate(0 0.001)">
                                                                                    <path id="Path_500" data-name="Path 500" d="M.352,16.55a.352.352,0,0,1-.34-.445l1.076-3.929a8.207,8.207,0,1,1,7.184,4.238h0a8.223,8.223,0,0,1-3.8-.932L.442,16.538a.354.354,0,0,1-.089.011Zm0,0" transform="translate(0)" fill="#e5e5e5" />
                                                                                    <path id="Path_501" data-name="Path 501" d="M10.894,26.741l1.114-4.069a7.855,7.855,0,1,1,6.806,3.933h0a7.848,7.848,0,0,1-3.753-.956Zm4.356-2.513.239.141a6.519,6.519,0,0,0,3.323.91h0a6.528,6.528,0,1,0-5.53-3.059l.155.247-.66,2.408Zm0,0" transform="translate(-10.542 -10.543)" fill="#fff" />
                                                                                    <path id="Path_502" data-name="Path 502" d="M19.344,34.681l1.076-3.928a7.582,7.582,0,1,1,6.57,3.8h0a7.581,7.581,0,0,1-3.623-.923Zm0,0" transform="translate(-18.718 -18.757)" fill="#64b161" />
                                                                                    <g id="Group_226" data-name="Group 226" transform="translate(0.352 0.352)">
                                                                                        <path id="Path_503" data-name="Path 503" d="M10.894,26.741l1.114-4.069a7.855,7.855,0,1,1,6.806,3.933h0a7.848,7.848,0,0,1-3.753-.956Zm4.356-2.513.239.141a6.519,6.519,0,0,0,3.323.91h0a6.528,6.528,0,1,0-5.53-3.059l.155.247-.66,2.408Zm0,0" transform="translate(-10.894 -10.895)" fill="#fff" />
                                                                                        <path id="Path_504" data-name="Path 504" d="M134.474,141.957c-.147-.327-.3-.333-.442-.339-.114,0-.245,0-.376,0a.721.721,0,0,0-.523.246,2.2,2.2,0,0,0-.687,1.637,3.817,3.817,0,0,0,.8,2.03,8.055,8.055,0,0,0,3.352,2.962c1.658.654,2,.524,2.355.491a1.982,1.982,0,0,0,1.325-.933,1.639,1.639,0,0,0,.115-.933c-.049-.082-.18-.131-.376-.229s-1.161-.573-1.341-.638-.311-.1-.442.1-.507.638-.621.769-.229.148-.425.049a5.366,5.366,0,0,1-1.578-.974,5.914,5.914,0,0,1-1.092-1.359c-.114-.2,0-.293.086-.4a5.921,5.921,0,0,0,.49-.671.362.362,0,0,0-.016-.344C135.03,143.316,134.648,142.345,134.474,141.957Zm0,0" transform="translate(-128.517 -137.388)" fill="#fff" fill-rule="evenodd" />
                                                                                    </g>
                                                                                </g>
                                                                            </svg> <?php echo $order->sconatct1 ?>
                                                                        </a></li>
                                                                </ul>
                                                            </li>
                                                            <a class="dropdown-item" href="//api.whatsapp.com/send?phone=+<?php echo $order->contactone ?>&text=Hi Service Reminde" style="font-size: 16px;"><i class="fe fe-bell" style="font-size:18px;color:#FB8266"> </i>Send Service Reminder</a>
                                                            <a class="dropdown-item" href="//api.whatsapp.com/send?phone=+<?php echo $order->contactone ?>&text=Hi  Purchase Remainder" style="font-size: 16px;"><i class="fe fe-bell" style="font-size:18px;color:#FB8266"> </i>Send Kit Purchase Remainder</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>

                                </tbody>

                            </table>
                            <?php echo $links ?>
                        </div>
                    </form>
                </div>
            </div>


            <!-- End Main Content-->
            <div class="modal fade" id="addModal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Import Order Data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form method="post" action='<?php echo base_url('bulkneworder') ?>' enctype="multipart/form-data">
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
                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Import Order Data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form method="post" action='<?php echo base_url('bulkneworder') ?>' enctype="multipart/form-data">
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
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="camDateModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Filter By Cam Date</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button" onclick="setCamData('<?php echo $this->input->get('camfrom') ?>')"><span aria-hidden="true">&times;</span></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mg-b-10">From</p>
                                <input type="date" class="form-control" name="camfrom" id="from" value='<?php echo $this->input->get('camfrom') ?>'>
                            </div>
                            <div class="col-md-6">
                                <p class="mg-b-10">To</p>
                                <input type="date" class="form-control" name="camto" id="to" value='<?php echo $this->input->get('camto') ?>'>
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
    <div class="modal fade" id="installDateModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Filter By Install Date</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mg-b-10">From</p>
                                <input type="date" class="form-control" name="installfrom" id="from" value='<?php echo $this->input->get('installfrom') ?>'>
                            </div>
                            <div class="col-md-6">
                                <p class="mg-b-10">To</p>
                                <input type="date" class="form-control" name="installto" id="to" value='<?php echo $this->input->get('installto') ?>'>
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
</div>
<!-- End Main Content-->

<script type="text/javascript">
    $('#example-select-all').change(function() {
        $('tbody tr td input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    });
</script>
<!-- for delete javascript -->
<script type="text/javascript">
    function GetSelected() {
        //Create an Array.
        var selected = new Array();

        //Reference the Table.
        var tblFruits = document.getElementById("customDatatable");

        //Reference all the CheckBoxes in Table.
        var chks = tblFruits.getElementsByTagName("INPUT");

        // Loop and push the checked CheckBox value in Array.
        for (var i = 0; i < chks.length; i++) {
            if (chks[i].checked) {
                selected.push(chks[i].value);
            }
        }

        //Display the selected CheckBox values.
        if (selected.length > 0) {
            alert('Are you sure you want to delete these data');
            $.ajax({
                url: '<?php echo base_url('deleteorder') ?>',
                type: 'POST',
                data: {
                    id: selected
                },
                success: function(response) {
                    if (response == 1) {
                        alert('Deleted successfully');
                        window.location.reload();
                    } else {
                        alert('Invalid ID.');
                    }

                }
            });
        } else {
            alert('Are you sure you want to delete all data');
            $.ajax({
                url: '<?php echo base_url('deleteorder') ?>',
                type: 'POST',
                data: {
                    id: selected
                },
                success: function(response) {

                    if (response == 1) {
                        // Remove row from HTML Table
                        alert('Deleted successfully');
                        window.location.reload();
                    } else {
                        alert('Invalid ID.');
                    }

                }
            });
        }
    };
</script>

<script>
    $(document).ready(function() {

        $('#customDatatable').DataTable({
            ordering: true,
            info: false,
            dom: 'Bfrtip',
            sizeof: 'A4',
            searching: false,
            sort: true,
            "fixedHeader": true,
            "bInfo": false,
            scrollResize: true,
            lengthChange: false,
            autWidth: false,
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
            buttons: []
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('.dropdown-submenu a.test').on("click", function(e) {
            // e.preventDefault();
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
</script>


<script type="text/javascript">
    $(function() {
        $("#txtDate").datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: 'images/calendar.gif',
            dateFormat: 'dd/mm/yy'
        });
    });
</script>

<script type="text/javascript">
    function filterByStatus(status) {
        var url = "<?php echo base_url(); ?>?status=" + status;
        document.location = url;
    }
</script>
<script type="text/javascript">
    function filterByProduct(name) {
        var url = "<?php URL ?>?product=" + name;
        document.location = url;
    }
</script>

<script type="text/javascript">
    function setCamData(from) {}
</script>
<script type="text/javascript">
    function searchInput() {
        $('#searchbar').addClass()
    }
</script>
<script>
    $('#click').on('click', function() {
        if ($('#click').text() === 'show') {
            $('#click').text('hide');
            $('#element')
        } else {
            $('#click').text('show');
            $('#element').css('display', 'none');
        }
    });
</script>