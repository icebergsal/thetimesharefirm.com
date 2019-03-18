<?php

/**
 * Class LABB_Number_Field
 */
if (!class_exists('LABB_Number_Field')) {

    class LABB_Number_Field {

        function __construct() {

            add_action('fl_builder_control_labb-number', array($this, 'render_input_field'), 1, 4);

            add_action( 'fl_builder_custom_fields', array( $this, 'register_field' ), 10, 1 );

            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        }

        function enqueue_scripts() {
            if (class_exists('FLBuilderModel') && FLBuilderModel::is_builder_active()) {
                wp_enqueue_script('labb-number', plugins_url('js/labb-number.js', __FILE__), array('jquery'), '', true);
            }
        }

        /**
         * Register field for BB 2.0 JS templates.
         */
        public function register_field($fields) {

            $fields['labb-number'] = LABB_PLUGIN_DIR . 'includes/fields/ui-field-labb-number.php';

            return $fields;
        }

        function render_input_field($name, $value, $field, $settings) {

            $preview = isset($field['preview']) ? json_encode($field['preview']) : json_encode(array('type' => 'refresh'));
            $preview = " data-preview='" . $preview . "'";

            $min = (isset($field['min'])) ? 'min="' . intval($field['min']) . '"' : '';
            $max = (isset($field['max'])) ? 'max="' . $field['max'] . '"' : '';
            $step = (isset($field['step'])) ? 'step="' . $field['step'] . '"' : '';
            if (empty($value)) {
                $value = (isset($field['default'])) ? intval($field['default']) : '';
            }

            ?>

            <div class='labb-number-wrap fl-field' data-type='text' <?php echo $preview; ?> style="display:inline-block;">
                <input type="number"
                       class="labb-number-input"
                       name="<?php echo $name; ?>" <?php echo $min; ?> <?php echo $max; ?> <?php echo $step; ?>
                       value="<?php echo esc_attr($value); ?>"/>
                <input type="text"
                       class="labb-number-hidden"
                       name="<?php echo $name; ?>"
                       value="<?php echo esc_attr($value);; ?>"
                       style="display:none;"/>
            </div>

            <?php

        }
    }

    new LABB_Number_Field();
}