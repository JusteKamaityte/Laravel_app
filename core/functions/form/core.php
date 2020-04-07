<?php
include 'core/functions/html.php';

/**
 * funkcija apsauganti nuo pavojingu ivesciu(POST)
 * @param array $form
 * @return array|null
 */
function get_filtered_input(array $form): ?array
{

    $filter_parameters = [];

    foreach ($form['fields'] as $field_id => $field) {

        if (isset($field['filter'])) {
            $filter_parameters[$field_id] = $field['filter'];
        } else {
            $filter_parameters[$field_id] = FILTER_SANITIZE_SPECIAL_CHARS;
        }
    }

    return filter_input_array(INPUT_POST, $filter_parameters);
}

/**
 * F-cija, kuri validuoja pacia forma
 * (sukuria fieldams-formai errorus)
 * @param array $form
 * @param array $safe_input isfiltruotas post masyvas
 * @return bool
 */
function validate_form(array &$form, array $safe_input): bool
{
    $success = true;
    foreach ($form['fields'] as $field_index => &$field) {
        $field['value'] = $safe_input[$field_index];
        foreach ($field['validate'] ?? [] as $validator_index => $field_validator) {
            if (is_array($field_validator)) {
                $validator_function = $validator_index;
                $validator_params = $field_validator;
                $is_valid = $validator_function($field['value'], $field, $validator_params);
            } else {
                $validator_function = $field_validator;
                $is_valid = $validator_function($field['value'], $field);
            }
            if (!$is_valid) {
                $success = false;
                break;
            }
        }
    }
    //Dabar tikrinsim formos lygio validatorius
    if ($success) {
        foreach ($form['validators'] ?? [] as $validator_index => $form_validator) {
            if (is_array($form_validator)) {
                $validator_function = $validator_index;
                $validator_params = $form_validator;
                $is_valid = $validator_function($safe_input, $form, $validator_params);
            } else {
                $validator_function = $form_validator;
                $is_valid = $validator_function($safe_input, $form);
            }
            if (!$is_valid) {
                $success = false;
                break;
            }
        }
    }
    if ($success) {
        if (isset($form['callbacks']['success'])) {
            $form['callbacks']['success']($safe_input, $form);
        }
    } else {
        if (isset($form['callbacks']['fail'])) {
            $form['callbacks']['fail']($safe_input, $form);
        }
    }
    return $success;
}

