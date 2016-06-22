
<input type="text" id="<?php echo $this->type; ?>_tag_select" class="form-control" autocomplete="off" placeholder = "<?php echo $this->type; ?> Tags">

<div class="col-sm-12 <?php echo $this->type; ?>_tagss" id="<?php echo $this->type; ?>_new_tag">

</div>
<div class="col-sm-12 <?php echo $this->type; ?>_reciverr" id="<?php echo $this->type; ?>_close">

        <?php
        if ($this->field_val != '') {
                $arrs = explode(',', $this->field_val);
                foreach ($arrs as $val) {
                        $cat = ProductCategory::model()->findByPk($val)->category_name;
                        if ($val != '')
                                echo '<div class="' . $this->type . '_tagedd">' . $cat . '<i class="fa fa-close ' . $this->type . '_closee" id="' . $val . '"></i></div>';
                }
        }
        ?>
</div>
<style>
        .<?php echo $this->type; ?>_need_add{
                width: auto;
                height: 30px;
                padding-top: 5px;
                padding-bottom: 5px;
                padding-left: 10px;
                cursor: pointer;
        }
        .<?php echo $this->type; ?>_need_add:hover{
                background-color: rgb(200, 234, 247);
                color: rgb(155, 131, 131);
                border-radius: 3px;
        }
        .<?php echo $this->type; ?>_closee{
                margin-left: 10px;
                cursor: pointer;
        }
        .<?php echo $this->type; ?>_tagedd{
                min-width: 50px;
                margin-bottom: 10px;
                height: 32px;
                border-radius: 4px;
                border:1px solid #d2d2d2;
                padding: 5px;
                float: left;
                margin-left: 10px;
                background-color: white;
        }
        .<?php echo $this->type; ?>_reciverr{
                height: 100px;
                background-color: rgb(244, 244, 244);
                border: 1px solid #d2d2d2;
                margin-bottom: 10px;
                padding: 10px;
                margin-top: 12px;
        }
        .<?php echo $this->type; ?>_tagss{
                position: absolute;
                z-index: 1000;
                background-color: white;
                border: 1px solid #d2d2d2;
                padding: 7px;
                display: none;
        }
        .<?php echo $this->type; ?>_tag-sub{
                width: auto;
                height: 30px;
                padding-top: 5px;
                padding-bottom: 5px;
                padding-left: 10px;
                border-bottom: 1px solid #d2d2d2;
                cursor: pointer;
        }
        .<?php echo $this->type; ?>_tag-sub:hover{
                background-color: rgb(200, 234, 247);
                color: rgb(155, 131, 131);
                border-radius: 3px;
        }
        .<?php echo $this->type; ?>_activee{
                background-color: rgb(200, 234, 247);
                color: rgb(155, 131, 131);
                border-radius: 3px;
        }
</style>

<script type="text/javascript">
        $(document).ready(function () {
                $(window).keydown(function (event) {
                        if (event.keyCode == 13) {
                                event.preventDefault();
                                return false;
                        }
                });
                $('#<?php echo $this->type; ?>_new_tag').on('click', '.<?php echo $this->type; ?>_need_add', function () {
                        var val = $(this).attr('id');
                        $.ajax({
                                'url': baseurl + 'site/<?php echo $this->type; ?>TagAdd',
                                'async': false,
                                'type': "POST",
                                'global': false,
                                'dataType': 'html',
                                'data': {tag: val, type: '<?php echo $this->type; ?>'},
                                success: function (result) {
                                        $('.<?php echo $this->type; ?>_reciverr').append('<div class="<?php echo $this->type; ?>_tagedd">' + val + '<i class="fa fa-close <?php echo $this->type; ?>_closee"></i></div>')
                                        $('#<?php echo $this->category_tag_id; ?>').val($('#<?php echo $this->category_tag_id; ?>').val() + val + ',');
                                        $('#<?php echo $this->type; ?>_tag_select').val('');
                                        $(".<?php echo $this->type; ?>_tagss").html('');
                                        $(".<?php echo $this->type; ?>_tagss").hide();

                                }

                        });

                });

                /* $('#category_tag_select').live('click',function(){
                 var cat= $('#<?php //echo $this->category_id;                                                                        ?>').val();
                 if(cat==''){
                 alert('Select a Category first.');
                 $('#<?php //echo $this->category_id;                                                                        ?>').focus();
                 }

                 });*/


                $('#<?php echo $this->type; ?>_tag_select').on('keyup', function (event) {
                        if (event.which == 17 || event.which == 18 || event.which == 37 || event.which == 39) {

                        } else if (event.which == 40) {
                                if ($(".<?php echo $this->type; ?>_tag-sub").hasClass("<?php echo $this->type; ?>_activee")) {

                                        $(".<?php echo $this->type; ?>_activee + .<?php echo $this->type; ?>_tag-sub").addClass("<?php echo $this->type; ?>_next");
                                        $(".<?php echo $this->type; ?>_activee").removeClass("<?php echo $this->type; ?>_activee");
                                        $(".<?php echo $this->type; ?>_next").addClass("<?php echo $this->type; ?>_activee");
                                        $(".<?php echo $this->type; ?>_activee").removeClass("<?php echo $this->type; ?>_next");

                                } else {

                                        $(".<?php echo $this->type; ?>_tagss .<?php echo $this->type; ?>_tag-sub").first().addClass("<?php echo $this->type; ?>_activee");
                                }
                        }
                        /*
                         * If enter event
                         */
                        else if (event.which == 13) {

                                if ($(this).val() != '' && $(".<?php echo $this->type; ?>_tag-sub").hasClass("<?php echo $this->type; ?>_activee")) {

                                        $('.<?php echo $this->type; ?>_reciverr').append('<div class="<?php echo $this->type; ?>_tagedd">' + $('.<?php echo $this->type; ?>_activee').html() + '<i class="fa fa-close <?php echo $this->type; ?>_closee"></i></div>')
                                        $('#<?php echo $this->category_tag_id; ?>').val($('#<?php echo $this->category_tag_id; ?>').val() + $('.<?php echo $this->type; ?>_activee').html() + ',');
                                        $('#<?php echo $this->type; ?>_tag_select').val('');
                                        $(".<?php echo $this->type; ?>_tagss").html('');
                                        $(".<?php echo $this->type; ?>_tagss").hide();
                                }

                        }
                        /*
                         * If key up event
                         */
                        else if (event.which == 38) {

                                if ($(".<?php echo $this->type; ?>_tag-sub").hasClass("<?php echo $this->type; ?>_activee")) {

                                        $(".<?php echo $this->type; ?>_activee").prev().addClass("<?php echo $this->type; ?>_next");
                                        $(".<?php echo $this->type; ?>_activee").removeClass("<?php echo $this->type; ?>_activee");
                                        $(".<?php echo $this->type; ?>_next").addClass("<?php echo $this->type; ?>_activee");
                                        $(".<?php echo $this->type; ?>_activee").removeClass("<?php echo $this->type; ?>_next");

                                } else {

                                        $(".<?php echo $this->type; ?>_tagss .<?php echo $this->type; ?>_tag-sub").last().addClass("<?php echo $this->type; ?>_activee");

                                }
                        }
                        else if ($(this).val() != '') {
<?php echo $this->type; ?>SelectTag($(this).val());
                        } else {
                                $('.<?php echo $this->type; ?>_tagss').hide();
                        }


                });

                $("#<?php echo $this->type; ?>_new_tag").on('click', '.<?php echo $this->type; ?>_tag-sub', function () {
                        $('.<?php echo $this->type; ?>_reciverr').append('<div class="<?php echo $this->type; ?>_tagedd">' + $(this).html() + '<i class="fa fa-close <?php echo $this->type; ?>_closee"></i></div>')
                        $('#<?php echo $this->category_tag_id; ?>').val($('#<?php echo $this->category_tag_id; ?>').val() + this.id + ',');
                        $('#<?php echo $this->type; ?>_tag_select').val('');
                        $(".<?php echo $this->type; ?>_tagss").html('');
                        $(".<?php echo $this->type; ?>_tagss").hide();
                });


                $('#<?php echo $this->type; ?>_close').on('click', '.<?php echo $this->type; ?>_closee', function () {
                        var value = $(this).attr('id');
                        var parent = $(this).parent().html();
                        var parent_res = parent.replace('<i class="fa fa-close <?php echo $this->type; ?>_closee"></i>', "");
                        var str = $('#<?php echo $this->category_tag_id; ?>').val();

                        var res = str.replace(value + ",", "");

                        $('#<?php echo $this->category_tag_id; ?>').val(res);
                        $(this).parent().remove();
                });




        });

        /*
         * For selecting the specific tag from the database as per the user input.
         *
         */
        function <?php echo $this->type; ?>SelectTag(val) {
                var cat = $('#<?php echo $this->category_tag_id; ?>').val();
                $.ajax({
                        'url': baseurl + 'site/<?php echo $this->type; ?>Cat',
                        'async': false,
                        'type': "POST",
                        'global': false,
                        'dataType': 'html',
                        'data': {tag: val, type: '<?php echo $this->type; ?>', taged: cat},
                        success: function (result) {
                                if (result != '') {
                                        $('.<?php echo $this->type; ?>_tagss').html(result);
                                        $('.<?php echo $this->type; ?>_tagss').show();
                                } else {
                                        $('.<?php echo $this->type; ?>_tagss').html('<div>This category is not available in our list</div>');
                                        $('.<?php echo $this->type; ?>_tagss').show();
                                }
                        }

                });
        }
</script>