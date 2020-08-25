<?php

function wordFilter($rows)
{
    $filtered_text = $rows;
    $filtered_text = str_replace('lips', '****', $filtered_text);
    $filtered_text = str_replace('echo', '****', $filtered_text);
    $filtered_text = str_replace('text', '****', $filtered_text);
    $filtered_text = str_replace('echo', '****', $filtered_text);
    return $filtered_text;
}









