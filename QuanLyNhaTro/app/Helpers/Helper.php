<?php

function formatMoney($data)
{
    return number_format($data, 0, ',', '.');
}
