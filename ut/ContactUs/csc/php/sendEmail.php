<?php
function url(){
  return sprintf(
    "%s://%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME']
  );
}
$userId = hexdec(uniqid());
if($_POST) {
    $servername = "localhost";
    $username = "kitchenUser";
    $password = "kitchenPass23";
    $database = "inthekitchenDB";
    
    $name = trim(stripslashes($_POST['name']));
    $email = trim(stripslashes($_POST['email']));
    $subject = trim(stripslashes($_POST['subject']));
    $contact_message = trim(stripslashes($_POST['message']));

    
     if ($subject == '') { $subject = "Contact Form Submission"; }
    

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    }
    
    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO ContactUs (id,Name,Email,Subject,Message) VALUES (?,?,?,?,?)");
    $stmt->bind_param("issss",$userId, $name, $email, $subject,$contact_message);
    $stmt->execute();
    echo "OK";
    
    $stmt->close();
    $conn->close();
    

}

?>
