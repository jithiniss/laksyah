<div class="clearfix"></div>

<div class="container security">
    <div class="row">


        <div class="col-md-9 pickle-space" style="padding-top: 150px; padding-left: 288px; ">
            <div class="row">
                <h1>My Wishlist</h1>
                <div class="col-md-9 forward">
                    <div class="row">

                        <table id="t01">
                            <tr>

                                <th class="sea">Id</th>
                                <th>Order Date</th>
                                <th>Product Name</th>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($wishlists as $wishlist) {
                                    $prod_name = Products::model()->findByPk($wishlist->prod_id)->product_name;
                                    ?>
                                    <tr>
                                        <td class="seat"><?= $i; ?> </td>
                                        <td><?= $wishlist->date; ?></td>
                                        <td><?= $prod_name; ?></td>
                                    </tr>

                                    <?php
                                    $i++;
                            }
                            ?>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

