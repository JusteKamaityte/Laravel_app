<?php

/**
 *funkcija generuojanti formos atributus
 * @param array $attr
 * @return string
 */
function html_attr(array $attr): string
{
    $attributes = '';

    foreach ($attr as $index => $value) {
        $attributes .= "$index=\"$value\" ";
    }

    return $attributes;
}

/**
 * @param $field
 * @param $field_id
 * @param $option_id
 * @return string
 */
function radio_attr(&$field, $field_id, $option_id){

    $attr = [
        'name' => $field_id,
        'value' => $option_id,
        'type' => 'radio'
    ];

    if(($field['value'] ?? '') == $option_id ){
        $attr['checked'] = true;
    }
    return html_attr($attr);
}

/**
 * @param $field_id
 * @param $field
 * @return string
 */
function input_attr($field_id,  $field){
    $attrs = $field['extra']['attr'] ?? [];
    $attrs += [
        'name' => $field_id,
        'type' => 'input',
        'value' => $field['value'] ?? ''
    ];

    return html_attr($attrs);
}

/**
 * @param $field_id
 * @param $field
 * @return string
 */
function select_attr($field_id, $field){
    $attr = $field['extra']['attr'] ?? [];
    $attr += [
        'name' => $field_id
    ];
    return html_attr($attr);
}

/**
 * @param $field
 * @param $field_id
 * @param $option_id
 * @return string
 */
function option_attr($field, $option_id){
    $attr = [
        'value' => $option_id,
    ];

    if(($field['value'] ?? '') == $option_id ){
        $attr['selected'] = true;
    }
    return html_attr($attr);
}

/**
 * @param $field
 * @param $field_id
 * @return string
 */
function textarea_attr($field, $field_id){
    $attr = $field['extra']['attr'] ?? [];
    $attr += [
        'name' => $field_id
    ];

    if(($field['value'] ?? '') == $field_id ){
        $attr['textarea'] = true;
    }
    return html_attr($attr);
}