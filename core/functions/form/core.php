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

    return get_filtered_input(INPUT_POST, $filter_parameters);
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

        foreach ($field['validate'] ?? [] as $item) {
            $is_valid = $item($value, $field);

            if (!$is_valid) {
                $success = false;
                break;
            }
        }
    }
    if (isset($form['callbacks']['success']) && $success) {
        //iskviecia funkcija
        $form['callbacks']['success']($form, $safe_input);
    } elseif (isset($form['callbacks']['failed']) && !$success) {
        $form['callbacks']['failed']($form, $safe_input);
    }

    return $success;
}
