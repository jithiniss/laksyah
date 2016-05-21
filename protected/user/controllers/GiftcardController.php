<?php

class GiftcardController extends Controller {

        public function actionIndex() {
                if (isset(Yii::app()->session['user'])) {

                        Yii::app()->session['gift_card_detail'] = $_POST['card_id'];
                        $billing = new UserAddress;
                        $addresss = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->session['user']['id']));
                        if (isset($_POST['giftsubmit'])) {
                                if ($_REQUEST['bill_address'] == 0) {
                                        if (isset($_POST['UserAddress']['bill'])) {
                                                $billing_address = $this->addAddress($billing, $_POST['UserAddress']['bill']);
                                                $bill_address_id = $billing_address;
                                                $this->AddCard($bill_address_id);
                                        }
                                } else {
                                        $this->AddCard($bill_address_id);
                                        $bill_address_id = $_REQUEST['bill_address'];
                                }
                        } else {
                                $this->render('bill_address', array('addresss' => $addresss, 'billing' => $billing));
                        }
                } else {
                        $this->redirect('site/login');
                }
        }

        public function addAddress($model, $data) {

                $model->attributes = $data;
                $model->address_1 = $data['address_1'];
                $model->address_2 = $data['address_2'];
                $model->contact_number = $data['contact_number'];
                $model->CB = Yii::app()->session['user']['id'];
                $model->DOC = date('Y-m-d');
                $model->userid = Yii::app()->session['user']['id'];
                if ($model->validate()) {
                        if ($model->save()) {
                                return $model->id;
                        } else {

                                return false;
                        }
                } else {
                        return false;
                }
        }

        public function actionAddCard($bill_address_id) {
                $new_card = new UserGiftscardHistory;
                $new_card->user_id = Yii::app()->session['user']['id'];
        }

}
