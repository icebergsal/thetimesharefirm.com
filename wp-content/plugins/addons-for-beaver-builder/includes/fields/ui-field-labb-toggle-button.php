<#
    var field = data.field,
        name = data.name,
        value = data.value,
        toggle = '',
        atts = '';

    // Toggle data
    if (field.toggle) {
        toggle = " data-toggle='" + JSON.stringify(field.toggle) + "'";
    }

    if (('undefined' === typeof value || '' === value) && field.default) {
        value = field.default;
    }
#>

<div class="labb-toggle-button fl-field" data-type="select" data-preview="{{data.preview}}">
    <input type="radio" class="labb_toggle_button_radio {{name}}" id="{{name}}_labb_toggle_1" name="{{name}}" value="yes" <# if ( value === 'yes' ) { #> checked <# } #>>
    <label class="labb_toggle_button_label {{name}}" for="{{name}}_labb_toggle_1"><?php echo __('Yes', 'livemesh-bb-addons') ?></label>
    <input type="radio" class="labb_toggle_button_radio {{name}}" id="{{name}}_labb_toggle_2" name="{{name}}" value="no" <# if ( value === 'no' ) { #> checked <# } #>>
    <label class="labb_toggle_button_label {{name}}" for="{{name}}_labb_toggle_2"><?php echo __('No', 'livemesh-bb-addons'); ?></label>
    <select class="labb_toggle_button_select labb_button_toggle" style="display:none;" name="{{name}}" {{{toggle}}}>
        <option value="yes"<# if ( value === 'yes' ) { #> selected="selected" <# } #>><?php echo __('Yes', 'livemesh-bb-addons') ?></option>
        <option value="no"<# if ( value === 'no' ) { #> selected="selected" <# } #>><?php echo __('No', 'livemesh-bb-addons'); ?></option>
    </select>
</div>