<?php
/**
 * validator max_100
 * @param $safe_input
 * @param $field
 * @return bool
 */
function validate_max_100($safe_input, &$field){

    if(strlen($field_input > 100)){
        $field['error'] = 'Įvesta per daug simbolių';
        return false;
    }
    return true;
}