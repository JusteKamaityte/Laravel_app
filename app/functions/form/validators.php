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
 * @return bool
 */
function validate_phone($field_input, array &$field): bool
{

    $pattern = '/\+3706[0-9]{7}/';

    if (!preg_match_all($pattern, $field_input)) {
        $field['error'] = 'blogai nurodytas numeris';

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

///**
// * @param $safe_input
// * @param $form
// * @return bool
// */
//function validate_player(array $safe_input, array &$form): bool
//{
//
//    $teams = file_to_array(TEAMS_FILE);
//    $team = $teams[$safe_input['team_id']];
//
//    foreach ($team['players'] as $player) {
//        if ($player['nickname'] == $safe_input['nickname']) {
//            $form['error'] = 'Toks žaidėjas jau yra';
//            return false;
//        }
//    }
//    return true;
//}
//
////patikrinti ar tokiu pavadinimu komanda dar nera registruota
///**
// * @param $field
// * @param $safe_input
// * @return bool
// */
//function validate_team(array $field, array $safe_input): bool
//{
//    $data = file_to_array(TEAMS_FILE);
//    foreach ($data ?? [] as $team) {
//        if ($safe_input == $team['team_name']) {
//            $field['error'] = 'tokia komanda egzistuoja';
//            return false;
//        }
//    }
//    return true;
//}

/**
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_email($field_input, array &$field): bool
{

    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";;

    if (!preg_match_all($pattern, $field_input)) {
        $field['error'] = 'neteisingas email';
        return false;
    }
    return true;
}


/**
 *
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_email_unique($field_input, array &$field): bool
{
    if (App\App::$db->getRowsWhere('users', ['email' => $field_input])) {
        $field['error'] = 'tokiu vardu vartotojas jau egzistuoja';
        return false;
    }
    return true;
}


/**
 * @param $safe_input
 * @param $form
 * @return bool
 */
function validate_login($safe_input, array &$form): bool
{
    if (!App\App::$db->getRowsWhere('users', ['email' => $safe_input['email'], 'password' => $safe_input['password']])) {
        $field['error'] = 'neteisingi prisijungimo duomenys';
        return false;
    }
    return true;
}

/**
 * sutvarkya
 * @param array $safe_input
 * @param array $form
 * @return bool
 */
function validate_pixel(array $safe_input, array &$form): bool
{

    $conditions = [
        'x' => $safe_input['x'],
        'y' => $safe_input['y'],

    ];

    if ($pixels = App\App::$db->getRowsWhere('pixels', $conditions)) {
        $pixel = reset($pixels);//issitraukiam is array pirma nari
        if ($pixel['email'] != $_SESSION['email']) {
            $form['error'] = 'cannot override other pixels';
            return false;
        }
    }
    return true;
}

function validate_is_logged_in($safe_input, &$form)
{
    if (App\App::$session->getUser()) {
        return true;
    }
    $form['error'] = 'neprisijunges useris';
    return false;
}