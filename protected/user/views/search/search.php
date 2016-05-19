
<?php
if (empty($model)) {
        echo '<h1>No Data Found</h1>';
} else {
        foreach ($model as $search) {
                ?>
                <div class="row ">

                    <div class="col-md-4 col-sm-6 hidden-xs" style="width: 50%;">
                        <ul class="list-inline list-unstyled vendors headtop_right pull-right line-top">
                            <li>
                                <div class="dropdown">
                                    <div class="dropdown-content">
                                        <li onclick="$('#search_box').val($(this).text());
                                                    $('#result_box').hide();"><?php echo $search->category_tag; ?></li>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <?php
        }
}
?>