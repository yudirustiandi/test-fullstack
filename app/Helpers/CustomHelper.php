<?php

function rupiahSeparator($value = '')
{
    if ($value == '') {
        return '0';
    }

    return number_format($value, 0, ',', '.');
}
