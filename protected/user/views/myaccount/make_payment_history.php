<div class="container main_container inner_pages ">
    <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?><span>/</span> <?php echo CHtml::link('My Account', array('Myaccount/index')); ?>  <span>/</span>   My Credit </div>
    <div class="row">
        <?php echo $this->renderPartial('//myaccount/_menu'); ?>
        <!-- / Sidebar-->
        <?php
        if(Yii::app()->session['currency'] != "") {

                $cur_symbol = Yii::app()->session['currency']->currency_code;
        } else {
                $cur_symbol = 'INR';
        }
        ?>
        <div class="col-sm-9 user_content">

            <h1>My Payment History </h1>
            <!--<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Success </div>-->
            <div class="border_box">
                <?php if(!empty($history)) { ?>
                        <div class="row header_row">
                            <div class="col-xs-6">Description</div>
                            <div class="col-xs-6">Payment Details</div>


                        </div>
                        <?php foreach($history as $payments) { ?>


                                <div class="row">
                                    <div class="col-xs-6">

                                        <?php if($payments->product_name != "") { ?>
                                                <p><b>Product Name: </b><?php echo $payments->product_name; ?></p>
                                        <?php } ?>
                                        <?php if($payments->product_code != "") { ?>
                                                <p><b>Product Code: </b><?php echo $payments->product_code; ?></p>
                                        <?php } ?>

                                        <p><b>Payment for: </b><?php echo MasterPaymentType::model()->findByPk($payments->amount_type)->type; ?>
                                            <?php
                                            if($payments->amount_type == 5) {
                                                    echo " , " . $payments->other_amount_type;
                                            }
                                            ?></p>
                                        <p><?php echo $payments->message; ?></p>
                                        <p> <?php //echo date('d/m/Y - g:i:s A', strtotime(date($credit_history->entry_date)));                                       ?></p>

                                    </div>


                                    <div class="col-xs-6">

                                        <p><b>Type : </b><?php echo $payments->payment_type == 1 ? 'Direct Payment' : 'Enquiry Payment'; ?></p>
                                        <p><b>Amount : </b><?php echo $payments->total_amount . ' ' . $cur_symbol; ?></p>
                                        <p><b>Mode : </b>pay via <?php
                                            if($payments->payment_mode == 1) {
                                                    echo "Credit Amount";
                                            } elseif($payments->payment_mode == 2) {
                                                    echo "CREDIT/DEBIT CARD OR NET BANKING";
                                            } elseif($order->payment_mode == 3) {
                                                    echo "Paypal";
                                            } elseif($payments->payment_mode == 4) {
                                                    $wallet_amt = $payments->wallet;
                                                    if($payments->netbanking != '') {
                                                            $payment_amt = $payments->netbanking;
                                                            $method = 'CREDIT/DEBIT CARD OR NET BANKING';
                                                    } else if($payments->paypal != '') {
                                                            $payment_amt = $payments->paypal;
                                                            $method = 'Paypal';
                                                    }
                                                    echo "<br>Credit Amount = " . $wallet_amt . ' ' . $cur_symbol;
                                                    echo "<br>" . $method . " = " . $payment_amt . ' ' . $cur_symbol;
                                            }
                                            ?></p>
                                        <p><b>Date : </b> <?php echo date('d/m/Y - g:i:s A', strtotime(date($payments->date))); ?></p>
                                        <?php if($payments->transaction_id != 0) { ?>
                                                <p><b>Transaction Id : </b> <?php echo $payments->transaction_id; ?></p>
                                        <?php } ?>
                                        <?php if($payments->status == 1) { ?>
                                                <span class="label label-success" style="font-size: 90%;">Success</span>
                                        <?php } else if($payments->status == 2) {
                                                ?>
                                                <span class="label label-warning" style="font-size: 90%;">Payment Failed</span>
                                                <?php
                                        } else if($payments->status == 0) {
                                                ?>
                                                <span class="label label-warning" style="font-size: 90%;">Not Paid</span>
                                                <?php
                                        }
                                        ?>
                                    </div>

                                </div>
                                <?php
                        }
                } else {
                        ?>
                        <div class="row">
                            <div class="col-xs-12 col-mob-12">
                                <p><strong>No Payment History </strong></p>
                            </div></div>
                        <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>