<?php

function formatMoney($data)
{
    return number_format($data, 0, ',', '.');
}
function formatMonth($month){
    $result = \Carbon\Carbon::parse($month)->format('m');
    return $result;  
}
