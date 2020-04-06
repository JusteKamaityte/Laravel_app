<?php
/**
 * converts array in to string and saves in the file
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

/**
 * funkcija kuri atkuria masyva is failo
 * @param $file
 * @return bool|mixed
 */
function file_to_array(string $file)
{
    if (file_exists($file)) {
        $data = file_get_contents($file);
        if ($data !== false) {
            return json_decode($data, true);
        }
    }
    return false;
}
