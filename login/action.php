<?php
// Setup our variables and set them to empty
$user = $pass = "";
// Condition to detect form data and sanitize it
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = sanitize_inputs($_POST['user']);
    $email = sanitize_inputs($_POST['pass']);
}

// Function to sanitize the data

function sanitize_inputs($data){
    //Trim method removes spaces at beginning and end
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Values for MySQL Connection
$servername= "localhost";
$username= "root";
$password= "Madison06!**";
$dbname= "db_auth";

//Create the connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check Connection
if($conn){
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// SQL Query to Retrieve Data
$sql = "Select * From login";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if(mysqli_num_rows($result) > 0){
    // Output the data
    while($row = mysqli_fetch_assoc($result)){
        if($row["user"] === $user && $row["pass"] === $pass){
            echo "login Successful";
        }
    }
}else {
    echo "0 results";
}


?>


















