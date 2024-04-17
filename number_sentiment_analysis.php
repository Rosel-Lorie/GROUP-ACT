<?php

$number = $_POST['number'];

function analyzeNumberSentiment($number) {
    if ($number > 0) {
        return 'positive';
    } elseif ($number < 0) {
        return 'negative';
    } else {
        return 'neutral';
    }
}

echo analyzeNumberSentiment($number);

?>
