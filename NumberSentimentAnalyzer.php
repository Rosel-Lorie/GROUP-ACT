<?php

function analyzeNumberSentiment($number) {
    if ($number > 0) {
        return 'positive';
    } elseif ($number < 0) {
        return 'negative';
    } else {
        return 'neutral';
    }
}

?>
<script>function appendNumber(num) {
    document.getElementById('display').value += num;
}

function appendOperation(operator) {
    document.getElementById('display').value += operator;
}

function clearDisplay() {
    document.getElementById('display').value = '';
}

function calculate() {
    try {
        const expression = document.getElementById('display').value;
        const result = eval(expression);
        
        document.getElementById('result').innerHTML = result;
        
        // Send result for sentiment analysis
        analyzeNumberSentiment(result);
    } catch (error) {
        document.getElementById('result').innerHTML = 'Error';
    }
}

function analyzeNumberSentiment(number) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'number_sentiment_analysis.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = xhr.responseText;
            displaySentiment(response);
        }
    };

    xhr.send('number=' + encodeURIComponent(number));
}

function displaySentiment(sentiment) {
    alert('The sentiment is ' + sentiment + '!');
}
</script>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator</title>
    <link rel="stylesheet" href="style.css">

<h2>Simple Calculator</h2>
    <div class="calculator" style="margin-top:70px;">
        <input type="text" id="display" readonly>
        <div class="buttons">
            <button onclick="appendNumber('1')">1</button>
            <button onclick="appendNumber('2')">2</button>
            <button onclick="appendNumber('3')">3</button>
            <button onclick="appendOperation('+')">+</button>
            <button onclick="appendNumber('4')">4</button>
            <button onclick="appendNumber('5')">5</button>
            <button onclick="appendNumber('6')">6</button>
            <button onclick="appendOperation('-')">-</button>
            <button onclick="appendNumber('7')">7</button>
            <button onclick="appendNumber('8')">8</button>
            <button onclick="appendNumber('9')">9</button>
            <button onclick="appendOperation('*')">*</button>
            <button onclick="appendNumber('0')">0</button>
            <button onclick="clearDisplay()">C</button>
            <button onclick="calculate()">=</button>
            <button onclick="appendOperation('/')">/</button>
<p>Result: <span id="result"></span></p>
</head>
</html>