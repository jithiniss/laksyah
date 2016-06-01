<div class="container">
    <div class="row">
        <div class="blog_item">
            <h2>Card Id: <?= $data->unique_code; ?></h2>
            <p>Card Purchased Date:<?= $data->date; ?></p>
            <p>Card Amount :<?= $data->amount; ?></p>

            <a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/AddToWallet/<?= $data->id; ?>" name="confirm" class="btn btn-success pos btn-primary">Confirm</a>

            <div class="clearfix"></div>
        </div>
    </div>
</div>