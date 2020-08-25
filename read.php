<?php

include_once ('function.php');

$comment = $_POST['comment'];

$rows = explode(' ', $comment);

foreach ($rows as $key => $value) {
    $filtered_text = wordFilter($rows);
    foreach ($value = $filtered_text) {

    }
}


print_r($rows);








