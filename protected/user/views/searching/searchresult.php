<script>
        $(document).ready(function (e) {
            $('.search-panel .dropdown-menu').find('a').click(function (e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $('.search-panel span#search_concept').text(concept);
                $('.input-group #search_param').val(param);
            });
        });</script>
<section class="searching">
    <div class="container">
        <div class="row">
            <!--/* some session checking data deleted */-->






            <div class = "about_us searching_cnt resultss">
                <h2>Search Result</h2>

            </div>



            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => $file_name,
            ));
            ?>



        </div>
    </div>
</div>
</div>
</section>

<style>
    .highlight{
        color: red;
        background-color: yellow;
    }
</style>


<script>
        jQuery.fn.highlight = function (str, className) {
            var regex = new RegExp(str, "gi");
            return this.each(function () {
                $(this).contents().filter(function () {
                    return this.nodeType == 3 && regex.test(this.nodeValue);
                }).replaceWith(function () {
                    return (this.nodeValue || "").replace(regex, function (match) {
                        return "<span class=\"" + className + "\">" + match + "</span>";
                    });
                });
            });
        };
        $(".resultss *").highlight("<?php echo $parameter ?>", "highlight");
</script>
