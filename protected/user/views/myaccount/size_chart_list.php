<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <a href="#">HOME</a> <span>/</span> <a href="#">My Account</a> <span>/</span> Make a Payment </div>
        <div class="row">
                <div class="col-sm-3 sidebar">
                        <h3 class="side_nav_toggle"><i class="fa fa-align-justify "></i>My Account</h3>
                        <div class="cat_nav">
                                <ul class="catmenu">
                                        <li><a href="#">My Profile</a></li>
                                        <li> <a href="#">My Credit</a></li>
                                        <li> <a href="#">Address Book</a></li>
                                        <li> <a href="#">My Orders</a></li>
                                        <li> <a href="#">My Wishlist</a></li>
                                        <li> <a href="#">Measurement</a></li>
                                        <li> <a href="#">Make a Payment</a></li>
                                        <li> <a href="#">Track My Order</a></li>
                                </ul>
                        </div>
                </div>
                <div class="col-sm-9 user_content">
                        <h1>Measurement</h1>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered measurement_table">
                                <tr>
                                        <th>Date</th>
                                        <th>Product</th>
                                        <th>Product Code </th>
                                        <th>Action</th>
                                </tr>
                                <?php foreach ($chart as $list) { ?>
                                        <?php $product = Products::model()->findByAttributes(array('product_code' => $list->product_code)); ?>
                                        <tr>
                                                <td><?php echo date('d/m/Y', strtotime($list->date)); ?></td>
                                                <td><?php echo $list->product_name; ?></td>
                                                <td><?php echo $list->product_code; ?></td>
                                                <td><a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/ViewChart/id/<?php echo $list->id; ?>">View</a>|<a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/CopyChart/id/<?php echo $list->id; ?>">Copy</a>
                                                </td>
                                        </tr>

                                <?php }
                                ?>
                        </table>
                        <div class="form_button">
                                <a  href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/SizeChartType"><button class="btn btn-primary">ADD NEW MEASUREMENT</button></a></div>
                </div>


        </div>
</div>
