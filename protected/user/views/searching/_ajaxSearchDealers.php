<?php

if (!empty($model)) {
        $array = array();
        foreach ($model as $dealers) {
                if (isset($dealers->category_name) && $dealers->category_name != '') {
                        if (!in_array($dealers->category_name, $array)) {
                                array_push($array, $dealers->category_name);
                                echo'<li class="li-style" onclick="$(\'#search_box\').val($(this).text());$(\'#result_box\').hide();">' . $dealers->category_name . '</li>';
                        }
                }
                else if (isset($dealers->category_tag) && $dealers->category_tag != '') {
                        if (!in_array($dealers->category_tag, $array)) {
                                array_push($array, $dealers->category_tag);
                                echo '<li class="li-style" onclick="$(\'#search_box\').val($(this).text());$(\'#result_box\').hide();">' . $dealers->category_tag . '</li>';
                        }
                }
        }
}
else {
        echo 'invalid';
}
?>
