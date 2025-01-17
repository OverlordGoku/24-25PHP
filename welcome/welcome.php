<?php include 'header.php';

// Setup our variables and set them to empty
$name = $email = "";
// Condition to detect form data and sanitize it
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = sanitize_inputs($_POST['name']);
    $email = sanitize_inputs($_POST['email']);
    }

// Function to sanitize the data

function sanitize_inputs($data){
    //Trim method removes spaces at beginning and end
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




?>

<div class="row">
    <div class="col">
        <p>Welcome <?php echo $name; ?>,
            your email address is <?php echo $email; ?>.</p>
    </div>
</div>





<?php include 'footer.php' ?>
