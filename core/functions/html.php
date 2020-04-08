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

function radio_attr(array $field, $field_id, $option_id){

    $attr = [
        'name' => $field_id,
        'value' => $option_id,
        'type' => 'radio'
    ];

    if($field['value'] == $option_id ){
        $attr['checked'] = true;
    }
    return html_attr($attr);
}

