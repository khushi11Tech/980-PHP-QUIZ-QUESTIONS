<?php

$questions = array(

    1 => array(
        "question" => "Which of the following is used to declare a constant in PHP?",
        "options" => array(
            "A" => "constant()",
            "B" => "define()",
            "C" => "const()",
            "D" => "Both B and C"
        ),
        "answer" => "D"
    ),

    2 => array(
        "question" => "What will be the output of echo 5 + 3 * 2;?",
        "options" => array(
            "A" => "16",
            "B" => "11",
            "C" => "13",
            "D" => "10"
        ),
        "answer" => "B"
    ),

    3 => array(
        "question" => "Which operator is used to concatenate two strings in PHP?",
        "options" => array(
            "A" => "+",
            "B" => ".",
            "C" => "&",
            "D" => ","
        ),
        "answer" => "B"
    ),

    4 => array(
        "question" => "Which loop is generally used when the number of iterations is known?",
        "options" => array(
            "A" => "while loop",
            "B" => "do-while loop",
            "C" => "for loop",
            "D" => "switch"
        ),
        "answer" => "C"
    ),

    5 => array(
        "question" => "Which function removes whitespace from both ends of a string?",
        "options" => array(
            "A" => "trim()",
            "B" => "strip()",
            "C" => "clean()",
            "D" => "remove()"
        ),
        "answer" => "A"
    ),

    6 => array(
        "question" => "What is the purpose of the isset() function in PHP?",
        "options" => array(
            "A" => "To delete a variable",
            "B" => "To check whether a variable is set",
            "C" => "To create a variable",
            "D" => "To change the variable type"
        ),
        "answer" => "B"
    ),

    7 => array(
        "question" => "Which PHP function returns the length of a string?",
        "options" => array(
            "A" => "count()",
            "B" => "length()",
            "C" => "strlen()",
            "D" => "size()"
        ),
        "answer" => "C"
    ),

    8 => array(
        "question" => "Which superglobal is used to access data submitted through a POST form?",
        "options" => array(
            "A" => '$_GET',
            "B" => '$_POST',
            "C" => '$_REQUESTS',
            "D" => '$_FORM'
        ),
        "answer" => "B"
    ),

    9 => array(
        "question" => "Which function sorts an array in ascending order while maintaining key associations?",
        "options" => array(
            "A" => "sort()",
            "B" => "asort()",
            "C" => "rsort()",
            "D" => "ksort()"
        ),
        "answer" => "B"
    ),

    10 => array(
        "question" => "Which statement is used to stop the execution of a PHP script?",
        "options" => array(
            "A" => "stop()",
            "B" => "break()",
            "C" => "exit()",
            "D" => "end()"
        ),
        "answer" => "C"
    )

);

$score = 0;
$percentage = 0;
$performance = "";

if (isset($_POST["submit"])) {

    foreach ($questions as $number => $question) {

        if (isset($_POST["q" . $number])) {

            if ($_POST["q" . $number] == $question["answer"]) {
                $score++;
            }
        }
    }

    $percentage = ($score / 10) * 100;

    if ($percentage >= 80) {
        $performance = "Excellent";
    }
    elseif ($percentage >= 60) {
        $performance = "Good";
    }
    elseif ($percentage >= 40) {
        $performance = "Average";
    }
    else {
        $performance = "Needs Improvement";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>PHP Quiz System</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>PHP Quiz System</h1>

    <p class="intro">
        Answer all the questions and check your performance.
    </p>

    <form method="post">

        <?php

        foreach ($questions as $number => $question) {

        ?>

        <div class="question">

            <h3>
                <?php
                echo $number . ". " . $question["question"];
                ?>
            </h3>

            <?php

            foreach ($question["options"] as $key => $option) {

            ?>

                <label>

                    <input
                        type="radio"
                        name="q<?php echo $number; ?>"
                        value="<?php echo $key; ?>"
                        required
                    >

                    <?php
                    echo $key . ". " . $option;
                    ?>

                </label>

            <?php

            }

            ?>

        </div>

        <?php

        }

        ?>

        <input
            type="submit"
            name="submit"
            value="Submit Quiz"
        >

    </form>


    <?php

    if (isset($_POST["submit"])) {

    ?>

        <div class="result">

            <h2>Quiz Result</h2>

            <p>
                Score:
                <?php echo $score; ?> / 10
            </p>

            <p>
                Percentage:
                <?php echo $percentage; ?>%
            </p>

            <p>
                Performance:
                <?php echo $performance; ?>
            </p>

        </div>

    <?php

    }

    ?>

</div>

</body>

</html>