<?php
session_start();

// Check if the request method is POST and if the 'confirmed' parameter is set
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["confirmed"])) {
    // Include database connection
    require_once "config.php";

    // Prepare SQL statement to update balance
    $sql = "UPDATE users SET balance = balance - 100 WHERE id = ?";

    // Bind parameters
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Set the parameter
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set the parameter values
        $param_id = $_SESSION["id"];

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Update balance in the session
            $_SESSION["balance"] -= 100;

            // Prepare response data
            $response = array("balance" => $_SESSION["balance"]);

            // Send JSON response
            header("Content-Type: application/json");
            echo json_encode($response);
        } else {
            // If execution fails, send an error response
            header("HTTP/1.1 500 Internal Server Error");
            echo json_encode(array("error" => "Failed to update balance."));
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else {
    // If the request method is not POST or 'confirmed' parameter is not set, send an error response
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(array("error" => "Invalid request."));
}
?>
