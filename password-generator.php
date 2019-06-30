<?php

function checkForCharacterCondition($string) {
    return (bool) preg_match('/(?=.*([A-Z]))(?=.*([a-z]))(?=.*([0-9]))(?=.*([~`\!@#\$%\^&\*\(\)_\{\}\[\]]))/', $string);
}

$j = 1;

function generate_pass() {
    global $j;
    $allowedCharacters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~`!@#$%^&*()_{}[]';
    $pass = '';
    $length = 8;
    $max = mb_strlen($allowedCharacters, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pass .= $allowedCharacters[random_int(0, $max)];
    }

    if (checkForCharacterCondition($pass)){
        return '<br><strong>Selected password: </strong>'.$pass;
    }else{
        echo 'Iteration '.$j.':  <strong>'.$pass.'</strong>  Rejected<br>';
        $j++;
        return generate_pass();
    }

}

echo generate_pass();
