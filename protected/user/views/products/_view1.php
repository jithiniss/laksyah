<?php

/* if (isset(Yii::app()->session['temp_product_filter']) != '') {
  $this->render('index', array('dataProvider' => $dataProvider, 'parent' => $parent, 'category' => $category, 'name' => $name));
  } else { */
if (!empty($dataprovider) || $dataProvider != '') {
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
            'template' => "{pager}\n{items}\n{pager}",
        ));
}
/* } */
?>