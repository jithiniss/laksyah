<div class="col-md-6">
        <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                        <table class="table">
                                <tr>
                                        <th style="width: 10px">Sl.No.</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Image</th>
                                </tr>
                                <tr>
                                        <?php
                                        $i = 1;
                                        foreach ($out_stock as $stock) {
                                                ?>


                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $stock->product_name; ?></td>



                                                <?php
                                                $i++;
                                        }
                                        ?>
                                </tr>

                        </table>
                </div><!-- /.box-body -->
        </div><!-- /.box -->


</div>

