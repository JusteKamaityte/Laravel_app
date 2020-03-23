<?php

/**
 *funkcija pakeicia recursivearray reiksmes
 * @param $array
 * @param $from
 * @param $to
 */
function recursive_replace(&$array, $from, $to){
    if(is_array($array)) {
        if (!isset($array[''])) {
            $array[''] = TRUE;
            foreach($array as $key=>$val) {
                if(is_array($array[$key]) || is_object($array[$key])) {
                    recursive_replace($array[$key], $find, $replace);
                }
                else{
                    if($array[$key] === $find) {
                        $array[$key] = $replace;
                    }
                }
            }
            unset($data[RECURSIVE_REPLACE_MARKER]);
        }
    }
    elseif (is_object($data)) {
        if (!isset($data->RECURSIVE_REPLACE_MARKER)) {
            $data->RECURSIVE_REPLACE_MARKER = TRUE;
            foreach($data as $key=>$val) {
                if(is_array($data->$key) || is_object($data->$key)){
                    recursive_replace($data->$key, $find, $replace);
                }else{
                    if($data->$key === $find) {
                        $data->$key = $replace;
                    }
                }
            }
            unset($data->RECURSIVE_REPLACE_MARKER);
        }
    }
}

var_dump(recursive_replace($data));

?>

<html>
<head>
    <title>&</title>
    <style>

    </style>
</head>
<body>

</body>
</html>