<div class="container main_container inner_pages ">
    <div class="breadcrumbs"> <a href="#">HOME</a> <span>/</span> <a href="#">My Account</a> <span>/</span><a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/Profile">My Profile</a>
        <span>/</span>Change Password</div>
    <div class="row">
        <?php echo $this->renderPartial('_menu'); ?>
        <div class="col-sm-9 user_content">
            <h1>Change Password</h1>

            <div class="border-bottom">

                <div class="clearfix"></div>
                <?php if (Yii::app()->user->hasFlash('success')): ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                        </div>
                <?php endif; ?>
                <?php if (Yii::app()->user->hasFlash('notice')): ?>
                        <div class="alert alert-danger">
                            <strong>Danger!</strong> <?php echo Yii::app()->user->getFlash('notice'); ?>
                        </div>
                <?php endif; ?>
            </div>
            <div class="registration_form">
                <form  method="post" id="reset_form" action="<?= Yii::app()->baseUrl . '/index.php/Myaccount/ChangePassword' ?>" class="chng_pass_frm">
                    <div class="row">
                        <div class="chnge_passwrd">
                            <label>Current Password</label>
                            <input  class="form-control" type="password" name="current" id="current" placeholder="Current Password">
                        </div>
                        <div class="chnge_passwrd">
                            <label>New Password</label>
                            <input  class="form-control" type="password" name="password" id="password" placeholder="New Password">
                        </div>
                        <div  class="chnge_passwrd">
                            <label>Confirm Password</label>
                            <input  class="form-control " type="password" name="confirm" id="confirm" placeholder="Re-enter Password">
                        </div>
                        <div>
                            <span id="error" style="color: red"></span>
                            <button class="btn btn-success pos text-center form_button btn-primary" type="submit" name="submit" value="Submit">SUBMIT</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function () {
            $('#confirm').keyup(function () {
                Check(e = '');
            });
            $('#password').keyup(function () {
                Check(e = '');
            });
            $('#reset_form').submit(function (e) {
                Check(e);
            });
        });
        function Check(e) {
            var pass = $('#password').val();
            var confirm = $('#confirm').val();
            if (pass != '' && confirm != '') {

                if (pass != confirm) {
                    $('#error').html(" Password doesn't match");
                    if (e != '') {
                        e.preventDefault();
                    }
                } else {
                    $('#error').html("");
                }
            } else {
                $('#error').html("");
            }
        }
</script>