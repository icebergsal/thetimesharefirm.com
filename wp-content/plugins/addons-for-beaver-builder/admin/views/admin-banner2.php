<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

?>

<div id="labb-banner-wrap">

    <div id="labb-banner" class="labb-banner-sticky">
        <h2><span><?php echo __('Livemesh Addons for Beaver Builder', 'livemesh-bb-addons'); ?></span><?php echo __('Plugin Settings', 'livemesh-bb-addons') ?></h2>
        <div id="labb-buttons-wrap">
            <a class="labb-button" data-action="labb_save_settings" id="labb_settings_save"><i
                    class="dashicons dashicons-yes"></i><?php echo __('Save Settings', 'livemesh-bb-addons') ?></a>
            <a class="labb-button reset" data-action="labb_reset_settings" id="labb_settings_reset"><i
                    class="dashicons dashicons-update"></i><?php echo __('Reset', 'livemesh-bb-addons') ?></a>
        </div>
    </div>

</div>