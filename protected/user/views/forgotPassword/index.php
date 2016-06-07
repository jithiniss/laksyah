<div class="clearfix"></div>
<div class="container login">
    <div class="row">


        <div class="container main_container inner_pages centerd_page">

            <h1 class="text-center">Forgot Password</h1>
            <!--            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Success </div>-->
            <div class="registration_form">
                <form action="<?= Yii::app()->baseUrl; ?>/index.php/forgotPassword/index" method="post" id="form1" name="form1">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">

                            <label>Please enter your email address*</label>
                            <input type="email" class="form-contact" id="email" name="email" placeholder="   Enter your email" autocomplete="off" required="required">
                        </div>
                    </div>
                    <div class="text-center form_button">

                        <input style="text-transform: uppercase;
                               background-color: #f47721;
                               border-radius: 0;margin-top: 10px;
                               outline: none;
                               border: none;
                               height: 40px;
                               color: white;
                               line-height: 40px;
                               padding: 0px 20px;
                               transition: all 0.2s "
                               type="submit" name="btn_submit" class="btn btn-default bowl3 text-center form_button">


                    </div>
                </form>
            </div>
        </div>
        <!--        <div class="col-md-12 pickle-space">
                    <div class="row">
                        <h1>Forgot Your Password</h1>
                        <div class="col-md-4 col-md-offset-4 forward">
                            <form action="" method="post" id="form1" name="form1">
                                <div class="row">


                                    <label>Email</label>
                                    <div class="form-group">

                                        <input type="email" class="form-contact" id="email" name="email" placeholder="Enter your email">
                                    </div>



                                    <ul class="list-inline list-unstyled">

                                        <li><input type="submit" name="btn_submit" class="btn btn-default bowl3"></li>

                                    </ul>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>-->





    </div>
</div>
