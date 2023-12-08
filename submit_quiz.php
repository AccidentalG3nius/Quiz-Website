<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$score = 0;

foreach ($_POST as $questionId => $answer) {
    $questionId = str_replace("q", "", $questionId);

    $sql = "SELECT correct_answer, question_type FROM questions WHERE id = $questionId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $correctAnswer = $row['correct_answer'];

        // Check if the answer is correct
        if ($row['question_type'] === 'multiple_choice') {
            if ($answer === $correctAnswer) {
                $score++;
            }
        } elseif ($row['question_type'] === 'fill_in_the_blank') {
            // You may want to implement a case-insensitive comparison or additional validation here
            if (strtolower($answer) === strtolower($correctAnswer)) {
                $score++;
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
</head>
<body>
    <h1>Quiz Results</h1>

    <p>Your score: <?= $score; ?> out of <?= count($_POST); ?></p>
</body>
</html>