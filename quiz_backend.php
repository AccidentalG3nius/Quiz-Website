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
    <meta http-equiv="refresh" content="1200;url=quiz-end.html"> <!-- 1200 seconds = 20 minutes -->
    <title>Maths Quiz 1</title>
 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/general.css">
    <link rel="stylesheet" href="/CSS/topbar.css">
    <link rel="stylesheet" href="/CSS/rightside.css">
    <link rel="stylesheet" href="/CSS/leftside.css">
    <link rel="stylesheet" href="/CSS/sidebar.css">
    <link rel="stylesheet" href="/Hover/buttonhover.css">
    <style>
        p{
            font-family:Arial, Helvetica, sans-serif;
        }
        .logo{
            height:53px;
            margin-left:40px;
            margin-top:10px;
        }
     .Logintogetstarted{
        color:white;
        margin-top:25px;
        margin-left:200px;
        font-size:25px;
        font-weight:bold;
        
     }
     .home{
        height:30px;
        margin-top:50px;
        margin-left:30px;
     }
     .aboutus{
        height:30px;
        margin-top:50px;
        margin-left:25px
     }
     .page{
       
        margin-left:50px;
        width:100%
        margin-top:10px;
          }
    .welcome{
        margin-left:250px;
        margin-top:100px;
        font-family:arial;
        font-size:45px;
        font-weight:bold;
        margin-bottom:0px;
        
        }
    .box{
        margin-left:500px;
        display:inline-block;
        margin-top:50px;;
        border-width:1px;
        border-color:black;
        margin-top:100px;
        
       
    }
    .email{
        display:block;
        width:550px;
        height:45px;
        font-size:20px;
        font-family:arial;
       
        background-color: #F6F6F6;
        border-width:0px;
       
    }

    .pw{
        display:block;
        width:550px;
      border-width:0;
        margin-top:10px;
        height:45px;
       font-size:20px;
        font-family:arial;
        background-color: #F6F6F6;
       
    }

    .login_buttons{
        margin-top:20px;
    }
    .loginbutton{
        padding:15px;
        width:250px;
        height:65.2px;
        vertical-align: top;
        background-color: black;
        border-width:0;
        color:white;
        font-family:arial;
        font-size:25px;
        font-weight:bold;
        border-radius:5px;
        
    }
    .signup{
        width:260px;
        padding:15px;
        margin-left:40px;
        font-family:arial;
        font-size:20px;
        font-weight:bold;
        height:65.2px;
        background-color:#EEEEEE;
        border-width:0;
        color:black;
        border-radius:5px;
    }
    .logo_com{
        height:100px;
        margin-left:100px;
    }
      .contact{
        margin-left:100px;
        background-color:indigo;
        margin-top:500px;
        height:300px;
      }



    .contact_us{
        color:white;
        font-size:40px;
        margin-left:30px;
        
    }
    .phone{
        color:white;
        font-size:15px;
        margin-left:8px;
        vertical-align:top;
        display:inline-block;
    }

    .mail{
        color:white;
        font-size:15px;
        margin-left:8px;
        display:inline-block;
        vertical-align:top;
    }
    .insta{
        color:white;
        font-size:15px;
        vertical-align:top;
        margin-left:8px;
        display:inline-block;
    }
    .phoneicon{
        height:13px;
        margin-left:15px;
    }
    .mailicon{
        height:13px;
        margin-left:15px;
    }

    .instaicon{
        height:19px;
        margin-left:15px;


    }
    .instaid{
        color:white;
    }
    .please{
        margin-left:38px;
        font-family:arial;
        font-size:45px;
        font-weight:bold;
        margin-bottom:0px;
    }
    .profileicon{
        margin-left:180px;
        display:inline-block;
        border-radius:35px;
        height:50px;
        margin-top:10px;
    }
    .pavan{
        color:white;
        display: inline-block;
        margin-top:23px;
        font-size:25px;
        margin-left:10px
    }
    .logout{
        display:inline-block;
    }
    .logouticon{
        height:55px;
        margin-top:8px;
        margin-left:70px;
    
    }
    .content{
        margin-left:100px;
        margin-top:80px;
    }
    .welcomename{
      font-family:arial;
    }
    .welcomenamepavan{
        font-size:70px;
        display:inline-block;
        margin-left:20px;
    }
    .yourcourse{
        font-size:40px;
    }
    .nametext{
        display:inline-block;
        font-size:70px;
        color:indigo;
        vertical-align:top;
        margin-left:10px;
        font-weight:bolder;
    }
    .yourcourse{
        margin-top:20px;
        margin-left:15px;
        font-weight:bold;
    }
    .maths{
        padding:30px;
        margin-left:20px;
        width:1338px;
        border-radius:8px;
        margin-top:20px;
        color:white;
        font-size:30px;
        background-color:indigo;
        border-width:0;
        transition:0.5s;
        font-weight:bold;
    }
    .physics{
        padding:30px;
        margin-left:20px;
        width:1338px;
        border-radius:8px;
        margin-top:20px;
        color:white;
        font-size:30px;
        background-color:purple;
        border-width:0;
        transition:0.5s;
        font-weight:bold;
    }
    .electronics{
        padding:30px;
        margin-left:20px;
        width:1338px;
        border-radius:8px;
        margin-top:20px;
        color:white;
        font-size:30px;
        background-color:black;
        border-width:0;
        transition:0.5s;
        font-weight:bold;
    }
    .idealab{
        padding:30px;
        margin-left:20px;
        width:1338px;
        border-radius:8px;
        margin-top:20px;
        color:white;
        font-size:30px;
        background-color:rgba(145, 5, 5, 0.963);
        border-width:0;
        transition:0.5s;
        font-weight:bold;
    }
    .kannada{
        padding:30px;
        margin-left:20px;
        width:1338px;
        border-radius:8px;
        margin-top:20px;
        color:white;
        font-size:30px;
        background-color:rgb(175, 89, 26);
        border-width:0;
        transition:0.5s;
        font-weight:bold;
    }
    .questionscolumn{
        margin-top:85px;
        margin-left:20px;
        margin-bottom:30px;
        font-size:60px;
        display:inline-block;
    }
    .heading1{
        margin-left:140px;
        font-size:35px;
        font-family:century;
        font-weight:bold;
        margin-bottom:15px;
       
    }
    
    
    

        .buttons{
            margin-top:20px;
            padding:20px;
        }
        .submit{
            margin-left:1000px;
        padding:30px;
        margin-bottom:15px;
        width:400px;
        font-size:30px;
        margin-top:30px;
        background-color: black;
        color:white;
        border-width:0;
        transition:0.5s;
    
        }
        .submit:hover{
            box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
    transform: translateY(-0.25em);
    cursor:pointer;
    opacity:0.8;

        }
    </style>
</head>
<body >
    <div id="timer">Time Remaining: <span id="time">30:00</span></div>
  <div class="topbar">
    <div class="left_side"><img class="logo" src="/Images/Logo.png"></div>
    <div class="middle_side">middle side</div>
    <div class="right_side">
        <img class="profileicon" src="/Images/rv.jpeg">
        <p class="pavan">Pavan G</p>
    </div>
         </div>

         <div class="questionscolumn">Questions</div>
         <form action="submit_quiz.php" method="post">
        
            <div class="questionbruh">
                <div class="questionbruh">
                <?php foreach ($questions as $question): ?>
                    <div class="heading1">Question <?= $question['id']; ?></div>
                    <div class="question1"><?= $question['question_text']; ?></div>
                    <?php if ($question['question_type'] === 'multiple_choice'): ?>
                    <?php $options = explode(',', $question['options']); ?>
                    <?php foreach ($options as $option): ?>
                        <div class="options"><input type="radio" name="q<?= $question['id']; ?>" value="<?= $option; ?>"> <?= $option; ?><div><br>
                    <?php endforeach; ?>                    
                    </div>
                <?php elseif ($question['question_type'] === 'fill_in_the_blank'): ?><br>
                <input type="text" name="q<?= $question['id']; ?>" placeholder="Your answer">

                <?php endif; ?>

            <br>
        <?php endforeach; ?>
    </div>
    <div class="buttons">
        <button class="submit">Submit</button>
    </div>
        

</body>
<script>
        // Set the countdown time in seconds
        var timeInSeconds = 1800; // 30 minutes

        function startTimer() {
            var timerElement = document.getElementById('time');

            function updateTimer() {
                var minutes = Math.floor(timeInSeconds / 60);
                var seconds = timeInSeconds % 60;

                // Add leading zeros if needed
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                timerElement.textContent = minutes + ':' + seconds;

                if (timeInSeconds > 0) {
                    timeInSeconds--;
                } else {
                    // Submit the form when the timer reaches 0
                    document.getElementById('quizForm').submit();
                }
            }

            // Update the timer every second
            var timerInterval = setInterval(updateTimer, 1000);
        }

        // Start the timer when the page loads
        document.addEventListener('DOMContentLoaded', startTimer);
    </script>
</html>
