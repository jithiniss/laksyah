<!--<input type="text" class="textbox-default-searchbox1" placeholder="Search for Deals/Company Name/Keyword/Category/Brand" id="search_box" name="keyword" autocomplete="off">-->
<div class="search_box">
        <input type="text" class="form-control" placeholder="Search style number or keyword" name="Keyword" id="search_box" autocomplete="off">
        <button type="submit" value="search" name="search" class="search" ><i class="fa fa-search"></i></button>
</div>
<ul class="ul-style" id='result_box' style=""></ul>

<script>

        $(document).ready(function () {

                $(window).keydown(function (event) {
                        if (event.keyCode == 13) {
                                event.preventDefault();
                                return false;
                        }

                });

                $("#search_box").on('keyup', function (event) {

                        var dealers_search = $('#search_box').val();

                        if (event.which == 17 || event.which == 18 || event.which == 37 || event.which == 39) {

                        } else if (event.which == 40) {

                                if ($(".li-style").hasClass("activee")) {
                                        $(".activee + .li-style").addClass("next");
                                        $(".activee").removeClass("activee");
                                        $(".next").addClass("activee");
                                        $(".activee").removeClass("next");

                                } else {
                                        $(".ul-style .li-style").first().addClass("activee");
                                }

                        } else if (event.which == 38) {

                                if ($(".li-style").hasClass("activee")) {

                                        $(".activee").prev().addClass("next");
                                        $(".activee").removeClass("activee");
                                        $(".next").addClass("activee");
                                        $(".activee").removeClass("next");

                                } else {

                                        $(".ul-style .li-style").last().addClass("activee");

                                }

                        }

                        else if (event.which == 13) {

                                if ($(".li-style").hasClass("activee")) {
                                        $('#search_box').val($('.activee').text());
                                        $('#result_box').hide();
                                }

                        } else if (dealers_search != "") {

                                $.ajax({
                                        type: "POST",
                                        url: baseurl + "Search/Index",
                                        data: "SearchValue=" + dealers_search,
                                }).done(function (result) {

                                        if (result == 'invalid') {
                                                $('#result_box').hide();
                                        } else {
                                                $('#result_box').html(result).show();
                                        }

                                });
                        } else {

                                $('#result_box').hide();
                        }

                });

        });

</script>
