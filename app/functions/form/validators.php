<?php
/**
 * validator max_100
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_max_100($field_input, &$field)
{

    if (strlen($field_input) > 100) {
        $field['error'] = 'Įvesta per daug simbolių';
        return false;
    }
    return true;
}


/**
 * Funkcija tikrina ar tekstas yra tinkamo ilgio
 * @param $field_input
 * @param $field
 * @param $parameters
 * @return bool
 */
function validate_text_lenght($field_input, &$field, $parameters)
{

    $text_lenght = strlen($field_input);

    if ($text_lenght < $parameters['min'] || $text_lenght > $parameters['max']) {
        $field['error'] = strtr('Žodis turi būti ilgesnis nei @min ir trumpesnis nei @max simbolių', [
            '@min' => $parameters['min'],
            '@max' => $parameters['max']
        ]);
        return false;
    }
    return true;
}

/**
 * validatorius turi patikrinti ar telefonas
 * atitinka +3706XXXXXXX formata
 * @param $field_input
 * @param $field
 */
function validate_phone($field_input, array &$field): bool{

    $pattern ='/\+3706[0-9]{7}/';

    if(!preg_match_all($pattern, $field_input)){
        $field['error'] = 'blogai nurodytas numeris';

        return false;
    }
    return true;
}

/**
 * @param $array
 * @param $file
 * @return bool
 */
function array_to_file(array $array, string $file): bool{

    $string = json_encode($array);

    $bytes_written = file_put_contents($file, $string);
    
//var_dump($bytes_written);
    if($bytes_written !== false){
        return true;
    }
    return false;
}