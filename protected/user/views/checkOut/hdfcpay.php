
<form  method="post" action="http://laksyah.com/hdfcpay/post.php" name="frmTransaction" id="frmTransaction" >


        <div class="container main_container inner_pages centerd_page">
                <h1 class="text-center">Proceed to Payment</h1>
                <div class="text-center payment_proceed">
                        <?php
                        /* if (isset(Yii::app()->session['currency'])) {
                          $symbol = Yii::app()->session['currency']->symbol;
                          } else {
                          $symbol = "fa-inr";
                          } */
                        ?>
                        <h3>Amount to be Paid <i class="fa fa-inr"></i> <?= $totaltopay; ?></h3>
                        <button class="btn-primary" type="submit">PAY NOW</button> &nbsp;
                        <button class="btn-cancel" type="reset">CANCEL</button>
                </div>
        </div>

        <table width="600" cellpadding="2" cellspacing="2" border="0" style="display:none;">
                <tr>
                        <th colspan="2">Transaction Details</th>
                </tr>
                <tr>
                        <td class="fieldName"><span class="error">*</span> Channel</td>
                        <td align="left"><select name="channel" >
                                        <option value="10">Standard</option>
                                </select></td>
                </tr>

                <tr>
                        <td class="fieldName" width="50%"><span class="error">*</span> Account Id</td>
                        <td  align="left" width="50%"> <input name="account_id" type="text" value="<?= $aid; ?>"/><br><span><font color="red"> Please Enter your Account ID provided.</font></span> </td>
                </tr>
                <tr>
                        <td class="fieldName" width="50%"><span class="error">*</span> Secret Key</td>
                        <td  align="left" width="50%"> <input name="secretkey" type="text" value="<?= $sec; ?>" size="35"/><br><span><font color="red"> Please Enter your Secret Key provided.</font></span></td>
                </tr>
                <tr>
                        <td class="fieldName" width="50%"><span class="error">*</span> Reference No</td>

                        <td  align="left" width="50%"> <input name="reference_no" type="text" value="<?php echo time(); ?>" /></td>
                </tr>
                <tr>
                        <td class="fieldName" width="50%"><span class="error">*</span> Sale Amount</td>
                        <td  align="left" width="50%"> <input name="amount" type="text" value="<?= $totaltopay; ?>" /> <select name="currency" >
                                        <option value="INR">INR</option>

                                </select></td>
                </tr>
                <tr>
                        <td class="fieldName"><span class="error">*</span> Description</td>
                        <td align="left"><input name="description" type="text" value="Test Product" /></td>
                </tr>
                <tr>
                        <td class="fieldName"><span class="error">*</span> Return Url</td>
                        <td align="left"><input name="return_url" type="text" size="60" value="http://laksyah.com/hdfcpay/response.php" /></td>
                </tr>
                <tr>
                        <td class="fieldName"><span class="error">*</span> Mode</td>
                        <td align="left"><select name="mode" >
                                        <option value="LIVE" selected>LIVE</option>
                                </select></td>
                </tr>
                <tr>
                        <th colspan="2">Billing Address</th>
                </tr>

                <tr>
                        <td class="fieldName"><span class="error">*</span> Name</td>
                        <td align="left">
                                <input name="name" type="text" value="Test Name" /></td>
                </tr>

                <tr>

                        <td class="fieldName"><span class="error">*</span>Address</td>
                        <td align="left">
                                <textarea name="address">Test Address</textarea>            </td>
                </tr>

                <tr>
                        <td class="fieldName"><span class="error">*</span>City</td>

                        <td align="left">
                                <input name="city" type="text" value="Mumbai" />            </td>
                </tr>

                <tr>
                        <td class="fieldName">State/Province</td>
                        <td align="left">
                                <input name="state" type="text" value="MH" />            </td>
                </tr>

                <tr>
                        <td class="fieldName"><span class="error">*</span>ZIP/Postal Code</td>
                        <td align="left">
                                <input name="postal_code" type="text" value="400069" />            </td>
                </tr>

                <tr>
                        <td class="fieldName"><span class="error">*</span>Country</td>
                        <td align="left">
                                <input name="country" type="text" value="IND" />            </td>
                </tr>

                <tr>
                        <td class="fieldName"><span class="error">*</span>Email</td>
                        <td align="left">
                                <input name="email" type="text" value="test@test.com" />            </td>
                </tr>

                <tr>

                        <td class="fieldName"><span class="error">*</span>Telephone</td>
                        <td align="left"><input name="phone" type="text" value="2211112222" /></td>
                </tr>

                <tr>
                        <th colspan="2">Delivery Address</th>
                </tr>

                <tr>

                        <td class="fieldName"> Name</td>
                        <td align="left">
                                <input name="ship_name" type="text" value="Test Name" /></td>
                </tr>

                <tr>
                        <td class="fieldName">Address</td>
                        <td align="left">

                                <input name="ship_address" type="text" value="Test Address" />            </td>
                </tr>

                <tr>
                        <td class="fieldName">City</td>
                        <td align="left">
                                <input name="ship_city" type="text" value="Mumbai" />            </td>
                </tr>

                <tr>
                        <td class="fieldName">State/Province</td>
                        <td align="left">
                                <input name="ship_state" type="text" value="MH" />            </td>
                </tr>

                <tr>
                        <td class="fieldName">ZIP/Postal Code</td>
                        <td align="left">
                                <input name="ship_postal_code" type="text" value="400069" />            </td>
                </tr>

                <tr>
                        <td class="fieldName">Country</td>

                        <td align="left"><input name="ship_country" type="text" value="IND" /></td>
                </tr>


                <tr>
                        <td class="fieldName">Telephone</td>
                        <td align="left"><input name="ship_phone" type="text" value="2211112222" /></td>
                </tr>



                <tr>
                        <td valign="top" align="center" colspan="2">
                                <span class="error">*</span>
                                <span>denotes required field</span>            </td>
                </tr>

        </table>

</form>
