<div class="clearfix"></div>
<script type="text/javascript">
        $(document).ready(function () {
            $("#form1").submit(function () {
                var pass1 = $('#password1').val();
                var pass2 = $('#password2').val();
                if (pass1 && pass2 != "") {
                    if (pass1 != pass2) {
                        $('#password_error').text('password doesnot match');
                        return false;
                    } else {
                        $('#password_error').text('');
                        return true;
                    }

                }
            });
            $('.pass').keyup(function () {
                var pass1 = $('#password1').val();
                var pass2 = $('#password2').val();
                if (pass1 && pass2 != "") {
                    if (pass1 != pass2) {
                        $('#password_error').text('password doesnot match');
                    } else {
                        $('#password_error').text('');
                    }

                }

            });
        });
</script>
<div class="container login">
    <div class="row">
        <div class="col-md-12 pickle-space">
            <div class="row">
                <h1>Change Your Password</h1>
                <div class="col-md-4 col-md-offset-4 forward">
                    <?php if (Yii::app()->user->hasFlash('success')): ?>
                            <div class="alert alert-success">
                                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                            </div>
                    <?php endif; ?>
                    <?php if (Yii::app()->user->hasFlash('error')): ?>
                            <div class="alert alert-danger">
                                <strong>Danger!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
                            </div>
                    <?php endif; ?>
                    <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/ForgotPassword/Newpassword/" method="post" id="form1" name="form1">
                        <div class="row">


                            <label>New Password</label>
                            <div class="form-group">

                                <input type="password" class="form-contact pass" id="password1" name="password1">
                            </div>
                            <label>Confirm Password</label>
                            <div class="form-group">

                                <input type="password" class="form-contact pass" id="password2" name="password2">
                                <div id="password_error"></div>
                            </div>
                            <ul class="list-inline list-unstyled">
                                <li><input type="submit" name="btn_submit" class="btn btn-default bowl3"></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <img src="<?php echo Yii::app()->baseUrl; ?>/images/border.png" class="img-responsive design"/> </div>
</div>
