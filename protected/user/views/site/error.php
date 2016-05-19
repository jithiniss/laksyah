<style>
    body{
        font-family:Arial, Helvetica, sans-serif;
        background:url(<?php echo Yii::app()->request->baseUrl ?>/images/bg2.png);
    }
    .wrap{
        width:1000px;
        margin:0 auto;
    }
    .main{
        text-align:center;
        background: rgba(255, 255, 255, 0.04);
        color:#FFF;
        font-weight:bold;
        margin-top:160px;
        border:1px solid rgba(102, 102, 102, 0.31);
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
    }
    .main h3{
        font-size:16px;
        text-align:center;
        padding:30px 30px;
    }
    .main h1{
        font-size:40px;
        margin-top:15px;
        color:#1CD3CB;
        text-transform:uppercase;
        font-family: 'Fenix', serif;
    }
    .main p{
        font-size:20px;
        margin-top:15px;
        line-height:1.6em;
    }
    .main  span.error{
        color:#48C8D3;
        font-size:18px;
    }
    .main p span{
        font-size:14px;
        color:#24817A;
    }

</style>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Rajagiri Center for Business Studies</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <div class="wrap">
            <div class="main">
                <h3><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.png" class="img-responsive"></h3>
                <h1>Oops!  An Error Occurred </h1>
                <p> Something is broken. We will fix it as soon as possible. Sorry for any inconvenience caused.</p>

            </div>

        </div>
    </body>
</html>