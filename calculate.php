<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php?message=" . urlencode("Access denied. Use the form to submit data."));
    exit;
}
// Step 1: Helper function to sanitize input
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Step 2: Check if all fields are submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Step 3: Sanitize Inputs
    $num1 = isset($_POST['num1']) ? sanitize($_POST['num1']) : '';
    $num2 = isset($_POST['num2']) ? sanitize($_POST['num2']) : '';
    $operator = isset($_POST['operator']) ? sanitize($_POST['operator']) : '';

    // Step 4: Input Validation
    if ($num1 === '' || $num2 === '' || $operator === '') {
        header("Location: index.php?message=" . urlencode("All fields are required."));
        exit;
    }

    if (!is_numeric($num1) || !is_numeric($num2)) {
        header("Location: index.php?message=" . urlencode("Only numbers are allowed."));
        exit;
    }

    $num1 = (float)$num1;
    $num2 = (float)$num2;

    // Step 5: Calculate based on operator
    $result = 0;
    switch ($operator) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            if ($num2 == 0) {
                header("Location: index.php?message=" . urlencode("Cannot divide by zero."));
                exit;
            }
            $result = $num1 / $num2;
            break;
        default:
            header("Location: index.php?message=" . urlencode("Invalid operator."));
            exit;
    }

    // Step 6: Return result to frontend
    $output = "Result: $num1 $operator $num2 = $result";
    header("Location: index.php?message=" . urlencode($output));
    exit;
} else {
    header("Location: index.php?message=" . urlencode("Invalid request."));
    exit;
}
