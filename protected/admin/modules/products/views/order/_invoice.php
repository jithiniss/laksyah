<!doctype html>
<html>
    <head>
        <meta charset="utf-8">


        <style>

            .new{
                border: 1px solid #ddd; text-align: center;
            }
            .tlb_total{
                border: 1px solid #ddd; border-collapse: collapse;
            }
            .invoice-box{
                max-width:800px;
                margin:auto;
                padding:30px;
                border:1px solid #eee;

                font-size:13px;
                line-height:24px;
                font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;

            }


            .invoice-box table{
                width:100%;
                line-height:inherit;
                text-align:left;
            }
            .invoice-box table td{
                padding:5px;
                vertical-align:top;
            }
            .invoice-box table tr td:nth-child(2){
                text-align:right;
            }
            .invoice-box table tr.top table td{
                padding-bottom:20px;
            }
            .invoice-box table tr.top table td.title{
                font-size:30px;
                line-height:45px;
                //  color:#333;
            }
            .invoice-box table tr.information table td{
                padding-bottom:40px;
            }

            .invoice-box table tr.heading td{
                // background:#eee;
                border-bottom:1px solid #ddd;
                font-weight:bold;
            }

            .invoice-box table tr.details td{
                padding-bottom:20px;
            }
            .invoice-box table tr.item.last td{
                border-bottom:none;
            }


            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td{
                    width:100%;
                    display:block;
                    text-align:center;
                }

                .invoice-box table tr.information table td{
                    width:100%;
                    display:block;
                    text-align:center;
                }
            }
        </style>
    </head>
    <script>
            window.print();
    </script>
    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    LAKSYAH INVOICE
                                </td>

                                <td>
                                    Invoice #:<?php echo $order->id; ?><br>
                                    Order Date:<?php
                                    echo
                                    date("d/m/Y", strtotime($order->order_date));
                                    ?>
                                    <br>
                                    Payment Method: <?php
                                    if ($order->payment_mode == 1) {
                                            echo"Wallet";
                                    } elseif ($order->payment_mode == 2) {
                                            echo"Gateway";
                                    } elseif ($order->payment_mode == 3) {
                                            echo"Paypal";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td style="border: 1px solid #ddd;
                                    text-align: left;padding: 13px 0px 10px 20px" class="addr">
                                    <b> PAYMENT ADDRES.</b><br>
                                    <?php echo $user_address->first_name; ?>   <span>   <?php echo $user_address->last_name; ?></span><br>
                                    <?php echo $user_address->address_1; ?></br>
                                    <?php echo $user_address->company; ?><br>
                                    <?php echo $user_address->postcode; ?></br>
                                    <?php echo $user_address->state; ?></br>
                                    <?php echo $user_address->contact_number; ?>
                                </td>
                                <td style="  border: 1px solid #ddd;
                                    text-align: left;padding: 13px 0px 10px 20px">
                                    <b> BILLING ADDRES.</b><br>
                                    <?php echo $bill_address->first_name; ?>  <span>   <?php echo $bill_address->last_name; ?></span><br>
                                    <?php echo $bill_address->address_1; ?><br>
                                    <?php echo $bill_address->company; ?><br>
                                    <?php echo $bill_address->postcode; ?><br>
                                    <?php echo $bill_address->state; ?><br>
                                    <?php echo $bill_address->contact_number; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table class="tlb_total">
                <tr class="pro_info">
                    <th class="new">PRODUCT NAME</th><th class="new"> QUANTITY  </th><th class="new"> UNIT PRICE  </th><th class="new"> TOTAL  </th>
                </tr>
                <?php foreach ($order_details as $orders) { ?>
                        <?php
                        $product_names = Products::model()->findAllByAttributes(array('id' => $orders->product_id));
                        foreach ($product_names as $p_names) {
                                ?>
                                <tr> <td style="border: 1px solid #ddd; text-align: left; padding: 6px 0px 0px 20px;"><?php echo $p_names->product_name; ?></td>
                                    <td style="border: 1px solid #ddd; text-align: left;padding: 6px 0px 0px 20px;">
                                        <?php echo $orders->quantity; ?>
                                    </td>
                                    <td style="border: 1px solid #ddd; text-align: left;padding: 6px 0px 0px 20px;"><?php
                                        echo $p_names->price . '.00';
                                        ?></td>
                                    <td style="border: 1px solid #ddd; text-align: left;padding: 6px 0px 0px 20px;"> <?php echo ($orders->quantity * $p_names->price) . '.00'; ?></td>
                                </tr>
                                </br>
                        <?php }
                        ?>
                        <?php
                }
                ?>
                <tr>
                    <td align="center">TOTAL</td><td></td><td></td><td><strong  style="padding: 6px 0px 0px 17px;"><?php echo $order->total_amount . '.00'; ?></strong></td>
                </tr>
            </table>
            <!--            <button onclick="myFunction()">Print this page</button>-->
        </div>
    </body>
</html>