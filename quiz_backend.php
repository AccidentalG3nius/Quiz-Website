<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch questions from the database
function getQuestions($conn) {
    $sql = "SELECT * FROM questions";
    $result = $conn->query($sql);

    $questions = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }
    }

    return $questions;
}

// Fetch questions
$questions = getQuestions($conn);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Backend</title>
</head>
<body>
    <h1>Quiz Questions</h1>

    <form action="submit_quiz.php" method="post">
        <?php foreach ($questions as $question): ?>
            <p><?= $question['question_text']; ?></p>

            <?php if ($question['question_type'] === 'multiple_choice'): ?>
                <?php $options = explode(',', $question['options']); ?>
                <?php foreach ($options as $option): ?>
                    <input type="radio" name="q<?= $question['id']; ?>" value="<?= $option; ?>"> <?= $option; ?><br>
                <?php endforeach; ?>

            <?php elseif ($question['question_type'] === 'fill_in_the_blank'): ?>
                <input type="text" name="q<?= $question['id']; ?>" placeholder="Your answer"><br>

            <?php endif; ?>

            <br>
        <?php endforeach; ?>

        <input type="submit" value="Submit">
    </form>
</body>
</html>