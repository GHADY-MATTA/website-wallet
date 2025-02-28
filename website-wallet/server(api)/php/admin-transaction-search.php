<?php
$conn = mysqli_connect("localhost", "root", "", "usersignupWallet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['transactionKeyword'])) {
    $keyword = $conn->real_escape_string($_GET['transactionKeyword']);
    // Adjusted the SQL query to reflect your column names
    $sql = "SELECT * FROM transactions 
            WHERE user_id LIKE '%$keyword%' 
            OR id LIKE '%$keyword%' 
            OR transaction_type LIKE '%$keyword%' 
            OR amount LIKE '%$keyword%' 
            OR reference_id LIKE '%$keyword%' 
            OR status LIKE '%$keyword%' 
            OR created_at LIKE '%$keyword%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $output = "<div style='overflow-x:auto;'>";
        $output .= "<table border='1' cellpadding='5' cellspacing='0'>";
        $output .= "<tr>
                        <th>Transaction ID</th>
                        <th>User ID</th>
                        <th>Transaction Type</th>
                        <th>Amount</th>
                        <th>Reference ID</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>";

        // Loop through the rows and output the data
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . $row['id'] . "</td>"; // Transaction ID
            $output .= "<td>" . $row['user_id'] . "</td>"; // User ID
            $output .= "<td>" . $row['transaction_type'] . "</td>"; // Transaction Type
            $output .= "<td>" . $row['amount'] . "</td>"; // Amount
            $output .= "<td>" . $row['reference_id'] . "</td>"; // Reference ID
            $output .= "<td>" . $row['status'] . "</td>"; // Status
            $output .= "<td>" . $row['created_at'] . "</td>"; // Date
            $output .= "</tr>";
        }
        $output .= "</table>";
        echo $output;
    } else {
        echo "No results found.";
    }
}

$conn->close();
