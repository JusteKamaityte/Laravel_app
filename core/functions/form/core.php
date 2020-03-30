<?php
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
 *  Validates the form by checking for empty fields and saving previous input
 * @param array $form
 * @param $safe_input
 * @return bool
 */
function validate_form(array &$form, array $safe_input): bool
{
    $success = true;

    foreach ($safe_input as $field_id => $value) {
        $field = &$form['fields'][$field_id];
        $field['value'] = $value;

        foreach ($field['validate'] ?? [] as $validation_key  => $validator) {
           if(is_array($validator)){
               $valid = $validation_key($value, $field, $validator);
           }else{
               $valid = $validator($value, $field);
           }
        }
    }
    if (isset($form['callbacks']['success']) && $success) {

        $form['callbacks']['success']($form, $safe_input);
    } elseif (isset($form['callbacks']['failed']) && !$success) {
        var_dump('test');
        $form['callbacks']['failed']($form, $safe_input);
    }

    return $success;
}
