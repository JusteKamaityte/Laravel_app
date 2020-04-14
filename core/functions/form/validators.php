<?php

/**
 * funkcija grazina errora, jei laukelis tuscias, tikrina vieno field input
 * @param $field_input
 * @param $field
 * @return mixed
 */
function validate_not_empty($field_input, &$field): bool
{

    if (empty($field_input)) {
        $field['error'] = 'Laukelis tuščias';
        return false;
    }

    return true;
}


/**
 * sukurtus validatorius priskirti fieldui age
 * @param $safe_input
 * @param $field
 * @return bool
 */
function validate_is_number($safe_input, &$field)
{
    if (!is_numeric($safe_input)) {
        $field['error'] = 'laukas privalo būti skaičius';
        return false;
    }
    return true;
}

/**
 * funkcija tikrinanti ar skaičius yra teigiamas
 * @param $safe_input
 * @param $field
 * @return bool
 */
function validate_is_positive($safe_input, &$field)
{

    if ($safe_input <= 0) {
        $field['error'] = 'Lauko vertė privalo būti teigiamas skaičius';
        return false;
    }
    return true;
}

/**
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_has_space($field_input, array &$field): bool
{
    if (!strpos($field_input, ' ')) {
        $field['error'] = 'Turi įvesti ir VARDĄ ir PAVARDĘ';
        return false;
    }
    return true;
}

/**
 * @param $safe_input
 * @param $field
 * @param $parameters
 * @return bool
 */
function validate_field_range($safe_input, array &$field, $parameters)
{

    if ($safe_input < $parameters['min'] || $safe_input > $parameters['max']) {
        $field['error'] = strtr('Skaicius turi buti daugiau nei @min ir maziau nei @max', [
            '@min' => $parameters['min'],
            '@max' => $parameters['max']
        ]);

        return false;
    }
    return true;
}

///**
// * Patikrina ar pasirinkimas egzistuoja $field masyve
// * @param $field_input
// * @param $field
// * @return bool
// */
//function validate_select($field_input, array &$field): bool
//{
//    if (isset($field['value'][$field_input])) {
//        $field['error'] = 'Nera tokio pasirinkimo';
//        return false;
//    }
//    return true;
//}

/**
 * F-cija, patikrinanti ar fieldai sutampa
 * @param array $filtered_input isfiltruotas post masyvas
 * @param array $form
 * @param array $params sutampanciu fieldu indeksu masyvas
 * @return bool
 */
function validate_fields_match(array $filtered_input, array &$form, array $params): bool
{
    $comparison_field_id = $params[0];
    $comparison = $filtered_input[$comparison_field_id];
    foreach ($params as $field_id) {
        if ($comparison != $filtered_input[$field_id]) {
            $form['error'] = 'These fields do not match!';
            return false;
        }
    }
    return true;
}