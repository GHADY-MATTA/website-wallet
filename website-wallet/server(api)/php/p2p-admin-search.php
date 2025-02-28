<?php
// Create the connection to the SQL database
$conn = mysqli_connect("localhost", "root", "", "usersignupWallet");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully.<br>"; // Debugging message
}


if (isset($_GET['p2pKeyword'])) {
    $keyword = $conn->real_escape_string($_GET['p2pKeyword']); 
    // Protect against SQL injection
    $sql = "SELECT * FROM p2p_transactions 
            WHERE transaction_id LIKE '%$keyword%' 
            OR sender_user_id LIKE '%$keyword%' 
            OR receiver_user_id LIKE '%$keyword%' 
            OR sender_p2pnumber LIKE '%$keyword%' 
            OR recipient_p2pnumber LIKE '%$keyword%' 
            OR amount LIKE '%$keyword%' 
            OR status LIKE '%$keyword%' 
            OR created_at LIKE '%$keyword%' 
            OR reference_id LIKE '%$keyword%'";
    // Debug: Print the SQL query
    // echo "Executing query: " . $sql . "<br>"; // This will print the SQL query

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Wrapper div for horizontal scroll
        $output = "<div style='overflow-x:auto;'>";
        $output .= "<table border='1' cellpadding='5' cellspacing='0'>";

        // Table headers
        $output .= "<tr>
                        <th>Transaction ID</th>
                        <th>Sender User ID</th>
                        <th>Receiver User ID</th>
                        <th>Sender P2P Number</th>
                        <th>Recipient P2P Number</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Reference ID</th>
                    </tr>";

        // Loop through each row and output data in the correct order
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . $row['transaction_id'] . "</td>";
            $output .= "<td>" . $row['sender_user_id'] . "</td>";
            $output .= "<td>" . $row['receiver_user_id'] . "</td>";
            $output .= "<td>" . $row['sender_p2pnumber'] . "</td>";
            $output .= "<td>" . $row['recipient_p2pnumber'] . "</td>";
            $output .= "<td>" . $row['amount'] . "</td>";
            $output .= "<td>" . $row['status'] . "</td>";
            $output .= "<td>" . $row['created_at'] . "</td>";
            $output .= "<td>" . $row['reference_id'] . "</td>";
            $output .= "</tr>";
        }

        $output .= "</table>";
        echo $output;
    } else {
        echo "No results found.";
    }
}

$conn->close();
?>
