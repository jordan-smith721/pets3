<?php
/**
 * Created by PhpStorm.
 * User: Jsmit
 * Date: 1/25/2019
 * Time: 10:40 AM
 */
/* Validate a color
 *
 * @param String color
 * @return boolean
 */
function validColor($color) {
    global $f3;
    return in_array($color, $f3->get('colors'));
}

function validString($string) {
    if($string===""){
        return false;
    }else if (preg_match("/[a-z]/i", $string)){
        return true;
    } else
        return true;
}