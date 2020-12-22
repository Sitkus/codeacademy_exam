<?php

/**
 * Creates html attributes from a given array
 *
 * @param array $attr
 * @return string
 */
function html_attr(array $attr): string {
    $attribute_string = '';

    foreach ($attr as $name => $value) {
        $attribute_string .= "$name=\"$value\" ";
    }

    return $attribute_string;
}

/**
 * Prints for attributes as string
 *
 * @param $form
 * @return string
 */
function form_attr($form) {
    return html_attr($form['attr'] ?? [] + [
            'method' => 'POST'
        ]);
}

/**
 * Returns string of input attributes
 *
 * @param string $field_name
 * @param array $field
 * @return string
 */
function input_attr(string $field_name, array $field): string {
    $attributes = [
            'name' => $field_name,
            'type' => $field['type'],
            'value' => $field['value'] ?? '',
        ] + ($field['extra']['attr'] ?? []);

    return html_attr($attributes);
}

/**
 * Make button attributes as a string
 *
 * @param string $button_id
 * @param array $button
 * @return string
 */
function button_attr(string $button_id, array $button): string {
    $attributes = [
            'name' => 'action',
            'type' => $button['type'] ?? 'submit',
            'value' => $button_id,
        ] + ($button['extra']['attr'] ?? []);

    return html_attr($attributes);
}

/**
 * Returns string of select attributes
 *
 * @param string $field_id
 * @param array $field
 * @return string
 */
function select_attr(string $field_id, array $field): string {
    $attributes = [
            'name' => $field_id,
            'value' => $field['value'],
        ] + ($field['extra']['attr'] ?? []);

    return html_attr($attributes);
}

/**
 * Returns attributes for options
 *
 * @param string $option_id
 * @param array $option
 * @return string
 */
function option_attr(string $option_id, array $option): string {
    $attributes = [
        'value' => $option_id,
    ];

    if ($option['value'] === $option_id) {
        $attributes['selected'] = 'selected';
    }

    return html_attr($attributes);
}

/**
 * Generate <textarea> HTML element from an array
 *
 * @param string $textarea_id
 * @param array $textarea
 * @return string
 */
function textarea_attr(string $textarea_id, array $textarea): string {
    $attributes = [
            'name' => $textarea_id,
            'rows' => $textarea['rows'] ?? 5, // could be specified in CSS
            'cols' => $textarea['cols'] ?? 20, // could be specified in CSS
        ] + ($textarea['extra']['attr'] ?? []);

    return html_attr($attributes);
}
