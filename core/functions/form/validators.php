<?php

/**
 * Check if field values are the same
 *
 * @param $form_values
 * @param array $form
 * @param array $params
 * @return bool
 */
function validate_fields_match($form_values, array &$form, array $params): bool {
    foreach ($params as $field_index) {
        if ($form_values[$params[0]] !== $form_values[$field_index]) {
            $form['fields'][$field_index]['error'] = strtr('Field does not match with @field field', [
                '@field' => $form['fields'][$params[0]]['label']
            ]);

            return false;
        }
    }

    return true;
}

/**
 * Check if field is not empty
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_field_not_empty(string $field_value, array &$field): bool {
    if ($field_value == '') {
        $field['error'] = 'Field must be filled';
        return false;
    }

    return true;
}

/**
 * Check if input is numeric, but for optional field
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_numeric(string $field_value, array &$field): bool {
    if (!is_numeric($field_value) && strlen($field_value) > 0) {
        $field['error'] = 'Field input must be numeric';

        return false;
    };

    return true;
}

/**
 * Check if provided email is in correct format
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_email(string $field_value, array &$field): bool {
    if (!preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/', $field_value)) {
        $field['error'] = 'Invalid email format';

        return false;
    }

    return true;
}

/**
 * Validate that name length is below or equal to 40
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_name_length(string $field_value, array &$field) {
    if (strlen($field_value) >= 40) {
        $field['error'] = 'Too many letters, 40 is maximum';

        return false;
    }

    return true;
}

/**
 * Validate that textarea (comment) length
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_textarea_length(string $field_value, array &$field) {
    $field_value = trim($field_value, " \t\n\r");

    if (strlen($field_value) <= 500 && strlen($field_value) > 0) {
        return true;
    }

    $field['error'] = 'Too less or many letters. Only 1-400 is allowed.';
    return false;
}

/**
 * Checks if first or last name doesn't contain any non alphabetic symbols
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_no_symbols_numbers(string $field_value, array &$field) {
    if (!preg_match('/^[_A-z]*((-|\s)*[_A-z])*$/', $field_value)) {
        $field['error'] = 'Your first or last name cannot contain numbers or symbols';

        return false;
    }

    return true;
}
