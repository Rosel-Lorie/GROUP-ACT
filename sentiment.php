<?php
require_once 'vendor/autoload.php';

use Sentiment\Analyzer;

if (isset($_GET['text'])) {
    $text = $_GET['text'];
    $analyzer = new Analyzer();
    $sentiment = $analyzer->getSentiment($text);
    echo "<pre>";
    print_r($sentiment);
    echo "</pre>";
} else {
    echo "Text parameter is missing.";
}
?>
