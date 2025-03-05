Project Name: Website Wallet


Hosting Details 
Local URL: http://localhost/website-wallet/client/assets/homepage.html
External URL: https://5255ghady5255.ip-ddns.com/
IP Address: 35.180.75.140
GitHub Pages URL: GitHub Repository  https://github.com/GHADY-MATTA/website-wallet
Component Diagram 
Refer to the component diagram below for an overview of the major components of the application and their interactions.

API Documentation 
The following external APIs are utilized in this project:

jQuery CDN: A popular JavaScript library used for simplifying DOM manipulation, event handling, and AJAX requests. It is included via CDN for easier accessibility and faster integration.

jQuery CDN Documentation
Axios: A promise-based HTTP client for the browser and Node.js. Axios is used in this project to handle HTTP requests and responses in an easy and streamlined manner.

Axios Documentation
Gemini API: An API for interacting with the Gemini cryptocurrency exchange, providing access to real-time price data and other exchange functionalities.

[Gemini API Documentation](https:// Gemini.com)
MailComposer: A tool used for composing and sending emails via an SMTP server. In this project, it is used to manage email sending features.

MailComposer Documentation
api documentation ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------:
Connection.php: Database class: Handles MySQL connection. 

Constructor: Establishes connection to the usersignupWallet database. 

getConnection(): Returns the established connection
api documentation ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------:

TransactionSearchAPI:
Key Points:
Constructor: Accepts a database connection.
searchTransactions($keyword): Searches the transactions table for the keyword in multiple columns.
Output: Displays the matching transactions in a table if results are found, or shows "No results found."
api documentation ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------:
TransactionSearchA
<?php
require_once('../../admin/generals/connection.php'); // Include the database connection
require_once('../../admin/generals/TransactionSearchAPI.php'); // Include the TransactionSearchAPI class

// Check if a transaction search keyword is provided via GET
if (isset($_GET['transactionKeyword'])) {
    // Get the database connection
    $conn = $db->getConnection();
    
    // Create an instance of the TransactionSearchAPI class
    $api = new TransactionSearchAPI($conn);
    
    // Search transactions based on the provided keyword
    $api->searchTransactions($_GET['transactionKeyword']);
    
    // Close the database connection after the search
    $conn->close();
} else {
    // Output message if no search keyword is provided
    echo "No search keyword provided.";
}


Key Points:
Includes: The script includes the database connection and the TransactionSearchAPI class.
GET Check: It checks if a transactionKeyword is provided through the URL.
Database Connection: Establishes the connection to the database using $db->getConnection().
Transaction Search: Initializes the TransactionSearchAPI class and calls searchTransactions() with the provided keyword.
Connection Closure: Closes the database connection after the search.
This script will perform the search when the transactionKeyword is passed as a GET parameter.

api documentation ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------:



P2PTransactionAPI
Key Points:
Constructor: Takes a database connection.
searchTransactions($keyword): Searches the p2p_transactions table for rows matching the provided keyword in various columns.
Output: Displays matching transactions in an HTML table with horizontal scroll.
api documentation ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------:
<?php P2PTransactionAPI
require_once('../../admin/generals/connection.php'); // Include the database connection
require_once('../../admin/generals/P2PTransactionAPI.php'); // Include the P2PTransactionAPI class

// Check if a p2p search keyword is provided via GET
if (isset($_GET['p2pKeyword'])) {
    // Get the database connection
    $conn = $db->getConnection();
    
    // Create an instance of the P2PTransactionAPI class
    $api = new P2PTransactionAPI($conn);
    
    // Search P2P transactions based on the provided keyword
    $api->searchTransactions($_GET['p2pKeyword']);
    
    // Close the database connection after the search
    $conn->close();
} else {
    // Output message if no search keyword is provided
    echo "No search keyword provided.";
}
?>
Key Points:
Includes: It includes the connection.php file for database access and the P2PTransactionAPI.php class.
GET Check: The script checks if the p2pKeyword parameter is provided via the URL.
Database Connection: The connection is established using $db->getConnection().
Search: The searchTransactions() method of the P2PTransactionAPI class is called with the p2pKeyword.
Connection Close: After the transaction search, the database connection is closed.
This code will search P2P transactions based on the provided keyword from the URL and output the results.

api documentation ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------:
