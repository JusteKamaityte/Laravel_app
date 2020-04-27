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
 * F-cija, kuri validuoja pacia forma
 * (sukuria fieldams-formai errorus)
 * @param array $form
 * @param array $safe_input
 * @return bool
 */
function validate_form(array &$form, array $safe_input): bool
{
    $success = true;

    //tikrinam field lygio validatorius
    foreach ($form['fields'] as $field_index => &$field) {
        $field['value'] = $safe_input[$field_index];
        foreach ($field['validate'] ?? [] as $validator_index => $field_validator) {
            if (is_array($field_validator)) {
                $validator_function = $validator_index;
                $validator_params = $field_validator;

                $is_valid = $validator_function($field['value'],  $field, $validator_params);
            } else {
                $validator_function = $field_validator;
                $is_valid = $validator_function($field['value'], $field);
            }
            if (!$is_valid) {
                $success = false;
                var_dump($validator_index,$field_validator);
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
                var_dump($validator_index,$form_validator);
                break;
            }
        }
    }
    if ($success) {
        if (isset($form['callbacks']['success'])) {
            $form['callbacks']['success']($safe_input, $form);
        }
    }
    return $success;
}

/**
 * kodas kuris uzpildo forma is data masyvo
 * @param array $form
 * @param array $data
 */
function fill_form(array &$form, array $data): void{
    foreach ($form['fields'] as $field_id => &$field){
        //tikrinam ar isset data = field id
        if(isset($data[$field_id]) ){
            $field['value'] = $data[$field_id];

        }
    }
}