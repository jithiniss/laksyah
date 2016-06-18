<section class="content-header">
        <h1>
                Newsletter         <small>Emails</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Newsletter Emails  </li>
        </ol>
</section>


<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/NewsletterContent/admin'; ?>" class='btn  btn-laksyah manage'>Manage Newsletter</a>
<section class="content">
        <div class="box box-info">

                <div class="box-body">
                        <?php
                        $i = 0;
                        foreach ($emails as $email) {

                                if (++$i == 101) {
                                        ?>
                                </div>
                                <div class="mails">

                                        <?php
                                        echo $email->email . ', ';
                                        $i = 1;
                                } else {
                                        echo $email->email . ', ';
                                }
                        }
                        ?>

                        </tr>
                        </table>

                </div>

        </div>

</section><!-- form -->