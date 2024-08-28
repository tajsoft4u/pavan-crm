<style>
    #myDIV {
        display: none;
    }

    .editInput {
        width: 200px
    }
</style>
<div class="main-content side-content pt-0">

    <div class="container-fluid ">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-1">
                    <h4 class="main-content-title tx-30 text-white">ORDERS</h4>
                    <span class="text-white" style="font-size: 22px;padding-left:30px"><i class="fa fa-circle" style="color:#F53C56"></i> Pending Orders</span>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="card">
                <div class="card-body">
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
                                            <tr id="<?php echo $order->oid ?>">
                                                <td><label class="ckbox"><input type="checkbox" name="orderselect[]" value="<?php echo $order->oid; ?>" id="checkd"><span></span></label></td>
                                                <td><span class="editSpan camdate"> <?php echo date('Y-M-d', strtotime($order->camdate)) ?></span>
                                                    <input type="date" class="form-control editInput camdate" type="text" name="camdate" value="<?php echo date('Y-m-d', strtotime($order->camdate)) ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan installdate"> <?php echo date('Y-M-d', strtotime($order->installdate)) ?></span>
                                                    <input type="date" class="form-control editInput installdate" type="text" name="installdate" value="<?php echo date('Y-m-d', strtotime($order->installdate)) ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan complainnum"><?php echo $order->complainnum ?></span>
                                                    <input type="text" class="form-control editInput complainnum" type="text" name="complainnum" value="<?php echo $order->complainnum; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan modle"><?php echo $order->modle ?></span>
                                                    <input type="text" class="form-control editInput modle" type="text" name="modle" value="<?php echo $order->modle; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan otype"><?php echo $order->otype ?></span>
                                                    <input type="text" class="form-control editInput otype" type="text" name="otype" value="<?php echo $order->otype; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan status<?php echo $order->status ?>">
                                                        <?php $value = strtolower($order->status);
                                                        $color = $this->Constant_Model->getStatusColors($value);
                                                        echo $color . ' ' . $order->status; ?>
                                                    </span>
                                                    <div id="statusDropdown<?php echo $order->oid ?>" style="display:none">
                                                        <select class="form-control editInput select-lg select2-no-search status<?php echo $order->oid ?>" name="status" id="status<?php echo $order->oid ?>">
                                                            <option selected="" disabled="">Select Status</option>
                                                            <option value="NEW" <?php if ($order->status != '') {
                                                                                    echo ($order->status == 'NEW') ? 'selected' : '';
                                                                                } ?>>NEW</option>
                                                            <option value="COMPLETED" <?php if ($order->status != '') {
                                                                                            echo ($order->status == 'COMPLETED') ? 'selected' : '';
                                                                                        } ?>>COMPLETED</option>
                                                            <option value="PENDING" <?php if ($order->status != '') {
                                                                                        echo ($order->status == 'PENDING') ? 'selected' : '';
                                                                                    } ?>>PENDING</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td><span class="editSpan customername"><?php echo $order->customername ?></span>
                                                    <input type="text" class="form-control editInput customername" type="text" name="customername" value="<?php echo $order->customername; ?>" style="display: none;">
                                                </td>
                                                <td>
                                                    <span class="editSpan order_id"><?php echo $order->order_id; ?></span>
                                                    <input class="form-control editInput order_id" type="text" name="order_id" value="<?php echo $order->order_id; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan contactone"><?php echo $order->contactone ?></span>
                                                    <input type="text" class="form-control editInput contactone" type="text" name="contactone" value="<?php echo $order->contactone; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan contacttwo"><?php echo $order->contacttwo ?></span>
                                                    <input type="text" class="form-control editInput contacttwo" type="text" name="contacttwo" value="<?php echo $order->contacttwo; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan address"><?php echo $order->address ?></span>
                                                    <input type="text" class="form-control editInput address" type="text" name="address" value="<?php echo $order->address; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan address2"><?php echo $order->address2 ?></span>
                                                    <input type="text" class="form-control editInput address2" type="text" name="address2" value="<?php echo $order->address2; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan city"><?php echo $order->city ?></span>
                                                    <input type="text" class="form-control editInput city" type="text" name="city" value="<?php echo $order->city; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan state"><?php echo $order->state ?></span>
                                                    <input type="text" class="form-control editInput state" type="text" name="state" value="<?php echo $order->state; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan pincode"><?php echo $order->pincode ?></span>
                                                    <input type="text" class="form-control editInput pincode" type="text" name="pincode" value="<?php echo $order->pincode; ?>" style="display: none;" onblur="getInputValue(this,<?php echo $order->oid ?>)">
                                                </td>

                                                <td><span class="editSpan serviceprovider<?php echo $order->oid ?>"><?php echo $order->serviceprovider ?></span>
                                                    <div id="myDropdown2<?php echo $order->oid ?>" style="display:none">
                                                        <?php if ($order->serviceprovider != '') { ?>
                                                            <select class="form-control editInput select-lg select2 serviceprovider<?php echo $order->oid ?>" name="serviceprovider" id="serviceprovider<?php echo $order->oid ?>" onchange="getDroopdownValue(this)">
                                                                <? foreach ($services->result() as $key => $row) { ?>
                                                                    <option value="<?php echo $row->centername ?> " <?php if ($order->serviceprovider != '') {
                                                                                                                        echo ($order->serviceprovider == $row->centername) ? 'selected' : '';
                                                                                                                    } ?>><?php echo $row->centername ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        <?php } else { ?>
                                                            <select class="form-control editInput select-lg select2-no-search serviceprovider<?php echo $order->oid ?>" name="serviceprovider" id="serviceprovider<?php echo $order->oid ?>" onchange="getDroopdownValue(this)">
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                                <td><span class="editSpan sconatct1"><?php echo $order->sconatct1 ?></span>
                                                    <input type="text" class="form-control editInput sconatct1" type="text" name="sconatct1" value="<?php echo $order->sconatct1; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan scontact2"><?php echo $order->sconatct1 ?></span>
                                                    <input type="text" class="form-control editInput scontact2" type="text" name="scontact2" value="<?php echo $order->scontact2; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan paidby"><?php echo $order->paidby ?></span>
                                                    <input type="text" class="form-control editInput paidby" type="text" name="paidby" value="<?php echo $order->paidby; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan amount"><?php echo $order->amount ?></span>
                                                    <input type="text" class="form-control editInput amount" type="text" name="amount" value="<?php echo $order->amount; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan rawtds"><?php echo $order->rawtds ?></span>
                                                    <input type="text" class="form-control editInput rawtds" type="text" name="rawtds" value="<?php echo $order->rawtds; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan puretds"><?php echo $order->rawtds ?></span>
                                                    <input type="text" class="form-control editInput puretds" type="text" name="puretds" value="<?php echo $order->puretds; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan extraitem"><?php echo $order->extraitem ?></span>
                                                    <input type="text" class="form-control editInput extraitem" type="text" name="extraitem" value="<?php echo $order->extraitem; ?>" style="display: none;">
                                                </td>

                                                <td><span class="editSpan feedback"><?php echo $order->feedback ?></span>
                                                    <input type="text" class="form-control editInput feedback" type="text" name="feedback" value="<?php echo $order->feedback; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan problem"><?php echo $order->problem ?></span>
                                                    <input type="text" class="form-control editInput problem" type="text" name="problem" value="<?php echo $order->problem; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan firstservice"><?php echo $order->firstservice ?></span>
                                                    <input type="date" class="form-control editInput firstservice" type="text" name="firstservice" value="<?php echo $order->firstservice; ?>" style="display: none;" onblur="getFirstInputValue(this,<?php echo $order->oid ?>)">
                                                </td>
                                                <td><span class="editSpan secondservice"><?php echo $order->secondservice ?></span>
                                                    <input type="date" class="form-control editInput secondservice" type="text" name="secondservice" id="secondservice" value="<?php echo $order->secondservice; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan thirdservice"><?php echo $order->thirdservice ?></span>
                                                    <input type="date" class="form-control editInput thirdservice" type="text" name="thirdservice" id="thirdservice" value="<?php echo $order->thirdservice; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan kitpurchasedue"><?php echo $order->kitpurchasedue ?></span>
                                                    <input type="text" class="form-control editInput kitpurchasedue" type="text" name="kitpurchasedue" value="<?php echo $order->kitpurchasedue; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan promotionkit"><?php echo $order->promotionkit ?></span>
                                                    <input type="text" class="form-control editInput promotionkit" type="text" name="promotionkit" value="<?php echo $order->promotionkit; ?>" style="display: none;">
                                                </td>
                                                <td><span class="editSpan ordersource"><?php echo $order->ordersource ?></span>
                                                    <input type="text" class="form-control editInput ordersource" type="text" name="ordersource" value="<?php echo $order->ordersource; ?>" style="display: none;">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn-sm btn ripple btn-success  saveBtn" style="display: none;">Save</button>
                                                    <button type="button" class="btn-sm btn ripple btn-light  cancelBtn" style="display: none;">Cancel</button>
                                                    <div class="dropdown dropright dropmenu"> <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-light dropdown-toggle" data-toggle="dropdown" id="droprightMenuButton" type="button"><i class="fe fe-more-vertical"></i></button>
                                                        <div aria-labelledby="droprightMenuButton" class="dropdown-menu tx-13" style="border-radius:20px;padding:5px">
                                                            <a class="dropdown-item editBtn" style="font-size: 16px;"><i class="fe fe-edit" style="font-size:18px;color:#7764E4"> </i>Edit</a>
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




<!-- Inline Editing JQUERY  -->
<script>
    $(document).ready(function() {
        $('.editBtn').on('click', function() {
            //hide edit span
            $(this).closest("tr").find(".editSpan").hide();
            var ID = $(this).closest("tr").attr('id');

            var dropdown1 = document.getElementById("myDropdown2" + ID);
            if (dropdown1.style.display === "none") {
                dropdown1.style.display = "block";
            } else {
                dropdown1.style.display = "none";
            }
            var statusDropdown = document.getElementById("statusDropdown" + ID);
            if (statusDropdown.style.display === "none") {
                statusDropdown.style.display = "block";
            } else {
                statusDropdown.style.display = "none";
            }

            //show edit input
            $(this).closest("tr").find(".editInput").show();

            $(this).closest("tr").find(".dropmenu").hide();

            //hide edit button
            $(this).closest("tr").find(".editBtn").hide();

            //hide delete button
            $(this).closest("tr").find(".deleteBtn").hide();

            //show save button
            $(this).closest("tr").find(".saveBtn").show();

            //show cancel button
            $(this).closest("tr").find(".cancelBtn").show();

        });

        $('.saveBtn').on('click', function() {
            $(this).closest("tr").find(".dropmenu").show();
            $('#userData').css('opacity', '.5');
            var ID = $(this).closest("tr").attr('id');
            var trObj = $(this).closest("tr");
            var ID = $(this).closest("tr").attr('id');
            var inputData = $(this).closest("tr").find(".editInput").serialize();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('InterfaceController/ordersInlineEditing') ?>',
                dataType: "json",
                data: 'action=edit&id=' + ID + '&' + inputData,
                success: function(response) {
                    if (response.status == 1) {
                        trObj.find(".editSpan.order_id").text(response.data.order_id);
                        trObj.find(".editSpan.complainnum").text(response.data.complainnum);
                        trObj.find(".editSpan.camdate").text(response.data.camdate);
                        trObj.find(".editSpan.modle").text(response.data.modle);
                        trObj.find(".editSpan.otype").text(response.data.otype);
                        trObj.find(".editSpan.customername").text(response.data.customername);
                        trObj.find(".editSpan.contactone").text(response.data.contactone);
                        trObj.find(".editSpan.address").text(response.data.address);
                        trObj.find(".editSpan.city").text(response.data.city);
                        trObj.find(".editSpan.state").text(response.data.state);
                        trObj.find(".editSpan.pincode").text(response.data.pincode);
                        trObj.find(".editSpan.status" + ID).text(response.data.status);
                        trObj.find(".editSpan.serviceprovider" + ID).text(response.data.serviceprovider);
                        trObj.find(".editSpan.sconatct1").text(response.data.sconatct1);
                        trObj.find(".editSpan.scontact2").text(response.data.scontact2);
                        trObj.find(".editSpan.paidby").text(response.data.paidby);
                        trObj.find(".editSpan.amount").text(response.data.amount);
                        trObj.find(".editSpan.rawtds").text(response.data.rawtds);
                        trObj.find(".editSpan.puretds").text(response.data.puretds);
                        trObj.find(".editSpan.extraitem").text(response.data.extraitem);
                        trObj.find(".editSpan.feedback").text(response.data.feedback);
                        trObj.find(".editSpan.problem").text(response.data.problem);
                        trObj.find(".editSpan.firstservice").text(response.data.firstservice);
                        trObj.find(".editSpan.secondservice").text(response.data.secondservice);
                        trObj.find(".editSpan.thirdservice").text(response.data.thirdservice);
                        trObj.find(".editSpan.kitpurchasedue").text(response.data.kitpurchasedue);
                        trObj.find(".editSpan.promotionkit").text(response.data.promotionkit);
                        trObj.find(".editSpan.ordersource").text(response.data.scity);
                        trObj.find(".editSpan.ordersource").text(response.data.sstate);
                        trObj.find(".editSpan.ordersource").text(response.data.spincode);
                        trObj.find(".editSpan.ordersource").text(response.data.saddress);
                        trObj.find(".editSpan").show();
                        trObj.find(".editInput").hide();
                        trObj.find(".saveBtn").hide();
                        trObj.find(".cancelBtn").hide();
                        trObj.find(".editBtn").show();
                        trObj.find(".deleteBtn").show();
                        $(this).closest("tr").find(".dropmenu").show();
                        var dropdown1 = document.getElementById("myDropdown2" + ID);
                        if (dropdown1.style.display === "none") {
                            dropdown1.style.display = "block";
                        } else {
                            dropdown1.style.display = "none";
                        }
                        var statusDropdown = document.getElementById("statusDropdown" + ID);
                        if (statusDropdown.style.display === "none") {
                            statusDropdown.style.display = "block";
                        } else {
                            statusDropdown.style.display = "none";
                        }
                    } else {
                        alert(response.msg);
                    }
                    $('#userData').css('opacity', '');
                }
            });
        });

        $('.cancelBtn').on('click', function() {
            //hide & show buttons
            $(this).closest("tr").find(".saveBtn").hide();
            $(this).closest("tr").find(".cancelBtn").hide();
            $(this).closest("tr").find(".confirmBtn").hide();
            $(this).closest("tr").find(".editBtn").show();
            $(this).closest("tr").find(".deleteBtn").show();
            $(this).closest("tr").find(".dropmenu").show();
            //hide input and show values
            $(this).closest("tr").find(".editInput").hide();
            $(this).closest("tr").find(".editSpan").show();
        });

        $('.deleteBtn').on('click', function() {
            //hide edit & delete button
            $(this).closest("tr").find(".editBtn").hide();
            $(this).closest("tr").find(".deleteBtn").hide();

            //show confirm & cancel button
            $(this).closest("tr").find(".confirmBtn").show();
            $(this).closest("tr").find(".cancelBtn").show();
        });

        $('.confirmBtn').on('click', function() {
            $('#userData').css('opacity', '.5');
            var trObj = $(this).closest("tr");
            var ID = $(this).closest("tr").attr('id');
            $.ajax({
                type: 'POST',
                url: 'userAction.php',
                dataType: "json",
                data: 'action=delete&id=' + ID,
                success: function(response) {

                    if (response.status == 1) {
                        // trObj.remove();
                        trObj.find(".confirmBtn").hide();
                        trObj.find(".cancelBtn").hide();
                        trObj.find(".editBtn").show();
                        trObj.find(".deleteBtn").show();
                    } else {
                        trObj.find(".confirmBtn").hide();
                        trObj.find(".cancelBtn").hide();
                        trObj.find(".editBtn").show();
                        trObj.find(".deleteBtn").show();
                        alert(response.msg);
                    }
                    $('#userData').css('opacity', '');
                }
            });
        });
    });
</script>

<script>
    function getInputValue(input, id) {
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
                    html += '<option value="' + data[i].centername + '">' + data[i].centername + '</option>';
                }
                $(".serviceprovider" + id).html(html);
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
                $('.sconatct1').val(contact1);
                $('.scontact2').val(contact2);
                $('.scity').val(staluk);
                $('.sstate').val(sstate);

            }
        });
    }
</script>

<script>
    function getFormatedDate(date, duration) {
        const dateMonthFiltered = date.setMonth(date.getMonth() + duration);
        var newDate = new Date(dateMonthFiltered);
        var newDay = ("0" + newDate.getDate()).slice(-2);
        var newMonth = ("0" + (newDate.getMonth() + 1)).slice(-2);
        var newDateMonth = newDate.getFullYear() + "-" + (newMonth) + "-" + (newDay);
        return newDateMonth;
    }
</script>
<script>
    function getFirstInputValue(input, id) {
        const firstServiceDate = new Date(input.value);
        const secondServiceDate = getFormatedDate(firstServiceDate, 3);
        const thirdServiceDate = getFormatedDate(firstServiceDate, 3);
        $('.secondservice').val(secondServiceDate);
        $('.thirdservice').val(thirdServiceDate);
    }
</script>