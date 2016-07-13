<div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-body">
                        <div class="modal-body">
                                <!-- Nav tabs -->


                                <!-- Tab panes -->
                                <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active login_popup " id="home">
                                                <h2>MY ACCOUNT</h2>
                                                <h4>Sign in to your account</h4>
                                                <?php if (Yii::app()->user->hasFlash('login_list')): ?>
                                                        <div class="alert alert-danger mesage">
                                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                                <strong>sorry!</strong><?php echo Yii::app()->user->getFlash('login_list'); ?>
                                                        </div>
                                                <?php endif; ?>
                                                <form  name="login" id="login_form" action="<?= Yii::app()->baseUrl; ?>/index.php/Site/Login" method="POST">
                                                        <label>Email Address<font color="red">*</font></label>
                                                        <input class="form-control" type="text" name="UserDetails[email]" autocomplete="off" />
                                                        <label>Password<font color="red">*</font></label>
                                                        <input class="form-control" type="password" name="UserDetails[password]" autocomplete="off" />
                                                        <input type="hidden" name="gift_id"  id="gift_card" />
                                                        <input type="hidden" name="testing"  id="testing" value="testing" />
                                                        <p><a  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/forgotPassword/" class="forgot">Forgot Password?</a>
                                                                <a style="float:right;" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/new-user" class="forgot">Register Now</a></p>
                                                        <input type="submit"  class ="btn-primary btn-full" value="SIGN IN" />
                                                </form>
                                        </div>
                                </div>

                        </div>
                </div>
        </div>
</div>