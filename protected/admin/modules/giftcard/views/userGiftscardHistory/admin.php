<?php
/* @var $this UserGiftscardHistoryController */
/* @var $model UserGiftscardHistory */
?>
<style>
        .table th, td{
                text-align: center;
        }
        .table td{
                text-align: center;
        }
</style>


<div class="page-title">

        <div class="title-env">
                <h1 style="float: left;" class="title"> Giftscard Codes</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage  Giftscard Codes</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Manage  Giftscard Codes</strong>
                        </li>
                </ol>

        </div>

</div>
<div class="row">


        <div class="col-sm-12">
                <a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/giftcard/userGiftscardHistory/create'; ?>" class='btn  btn-laksyah manage'>Add Gift Card Code</a>

                <div class="panel panel-default">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'user-giftscard-history-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//                                'id',
                                array('name' => 'giftcard_id',
                                    'type' => 'raw',
                                    'value' => function($data) {

                                            $gift_details = GiftCard::model()->findByPk($data->giftcard_id);
                                            return $gift_details->name . '(AMOUNT:' . $gift_details->amount . ')';
                                    },
                                ),
                                array('name' => 'user_id',
                                    'type' => 'raw',
                                    'value' => function($data) {

                                            $user_id = UserDetails::model()->findByPk($data->user_id);
                                            if ($data->user_id != 0) {
                                                    return $user_id->first_name . '(USER ID:' . $user_id->id . ')';
                                            } else {
                                                    return 'User Not SPecified';
                                            }
                                    },
                                ),
                                array('name' => 'amount',
                                    'type' => 'raw',
                                    'value' => function($data) {

                                            $gift_details1 = GiftCard::model()->findByPk($data->giftcard_id);
                                            return $gift_details1->amount;
                                    },
                                ),
//                                'bill_address_id',
                                'unique_code',
                                'date',
                                /*
                                  'status',
                                  'date',
                                 */
                                array(
                                    'header' => 'Edit',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{update}',
                                ),
                                array(
                                    'header' => 'Delete',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{delete}',
                                ),
                            ),
                        ));
                        ?>
                </div>

        </div>


</div>

