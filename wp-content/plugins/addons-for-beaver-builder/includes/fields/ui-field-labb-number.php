<#

    var field = data.field,
        name = data.name,
        value = data.value,
        atts = '';


    if (field.min) {
        atts += ' min="' + parseInt(field.min) + '"';
    }

    if (field.max) {
        atts += ' max="' + field.max + '"';
    }

    if (field.step) {
        atts += ' step="' + field.step + '"';
    }

    if (('undefined' === typeof value || '' === value) && field.default) {
        value = field.default;
    }
#>


<div class='labb-number-wrap fl-field' data-type='text' data-preview="{{data.preview}}" style="display:inline-block;">
    <input type="number"
           class="labb-number-input"
           name="{{name}}" {{{atts}}}
           value="{{value}}"/>
    <input type="hidden"
           class="labb-number-hidden"
           name="{{name}}_hidden"
           value="{{value}}"
           style="display:none;"/>
</div>