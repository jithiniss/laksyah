<div class="container main_container inner_pages ">
    <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?> <span>/</span>FAQ </div>
    <div class="row">
        <?php echo $this->renderPartial('_staticmenu'); ?>
        <!-- / Sidebar-->
        <div class="col-sm-9 user_content">
            <h1>Q & A</h1>
            <!--<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Success </div>-->

            <article>
                <h3>ORDERS</h3>
                <div class="panel panel-default">
                    <div class="panel-heading"><strong><?php echo $model->order_q1; ?></strong></div>
                    <div class="panel-body">
                        <?php echo $model->order_a1; ?>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><strong><?php echo $model->order_q2; ?></strong></div>
                    <div class="panel-body">
                        <?php echo $model->order_a2; ?>
                    </div>
                </div>
                <h3>PAYMENTS</h3>
                <div class="panel panel-default">
                    <div class="panel-heading"><strong><?php echo $model->payment_q1; ?></strong></div>
                    <div class="panel-body">
                        <?php echo $model->payment_a1; ?>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><strong><?php echo $model->payment_q2; ?></strong></div>
                    <div class="panel-body">
                        <?php echo $model->payment_a2; ?>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>