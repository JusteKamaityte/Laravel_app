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
 * Patikrina ar pasirinkimas egzistuoja $field masyve
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_select($field_input, array &$field): bool
{
    if (isset($field['value'][$field_input])) {
        $field['error'] = 'Nera tokio pasirinkimo';
        return false;
    }
    return true;
}

/**
 *funkcija generuojanti formos atributus
 * @param array $attr
 * @return string
 */
function teams_attr(array $attr): string
{
    $attributes = '';

    foreach ($attr as $index => $value) {
        $attributes .= "$index=\"$value\" ";
    }

    return $attributes;
}

/**
 * @param $safe_input
 * @param $form
 * @return bool
 */
function validate_player(array $safe_input, array &$form): bool{

    $teams = file_to_array(TEAMS_FILE);
    $team = $teams[$safe_input['team_id']];

    foreach ($team['players'] as $player){
        if($player['nickname'] == $safe_input['nickname']){
            $form['error'] = 'Toks žaidėjas jau yra';
            return false;
        }
    }
    return true;
}

//patikrinti ar tokiu pavadinimu komanda jau nera registruota
/**
 * @param $field
 * @param $safe_input
 * @return bool
 */
function validate_team(array $field, array $safe_input): bool
{
    $data = file_to_array(TEAMS_FILE);
    foreach ($data ?? []  as $team) {
        if ($safe_input == $team['team_name']) {
            $field['error'] = 'tokia komanda egzistuoja';
            return false;
        }
    }
    return true;
}
