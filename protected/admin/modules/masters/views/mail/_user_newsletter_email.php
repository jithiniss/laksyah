<html>
        <head>
                <title>email</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        </head>
        <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
                <!-- Save for Web Slices (emailer.psd) -->
                <div style="margin:auto; width:776px; border:solid 2px #404241; margin-top:40px; margin-bottom:40px;">
                        <table id="Table_01" width="776" border="0" cellpadding="0" cellspacing="0" align="center">
                                <?php
                                echo $newsletter->heading . '<br><br>';
                                echo $newsletter->subheading . '<br><br>';
                                echo $newsletter->content . '<br><br>';
                                ?>
                                <img src="<?php echo $this->siteURL(); ?>/uploads/newsletter/<?= $newsletter->id; ?>.<?= $newsletter->image; ?>" width="116" height="162" alt=""/>


                        </table></div>
        </body>
</html>