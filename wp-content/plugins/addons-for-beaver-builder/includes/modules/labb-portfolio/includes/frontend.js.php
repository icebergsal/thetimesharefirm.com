<?php


?>

(function ($) {

    $(function () {

        new LABBPortfolio({
            id: '<?php echo $id ?>',
            layoutMode: '<?php echo $settings->layout_mode; ?>'

        });
    });

})(jQuery);
