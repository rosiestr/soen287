<?php

$xml = new DOMDocument("1.0","UTF-8");
$xml -> formatOutput = true;
$xml -> preserveWhiteSpace = false;
$xml->load("users.xml");

if (!$xml) {
  $users = $xml->createElement("users");
  $xml->appendChild($users);
}
else {
  $users=$xml->firstChild;
}

    if (isset($_POST['Register'])) {

      /*

      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $emailAddress = $_POST['emailAddress'];
      $password = $_POST['passWord'];
*/
      $firstName = $_POST['first'];
      $lastName = $_POST['last'];
      $emailAddress = $_POST['email'];
      $password = $_POST['password'];

      $address = $_POST['street'].", ".$_POST['city'].", ".$_POST['province'].", ".$_POST['zipcode'];

      $emp=$xml->createElement("user");
      $users->appendChild($emp);

      $fName=$xml->createElement("userFirstName",$firstName);
      $emp->appendChild($fName);

      $lName=$xml->createElement("userLastName",$lastName);
      $emp->appendChild($lName);

      $email=$xml->createElement("userEmail",$emailAddress);
      $emp->appendChild($email);

      $passWord=$xml->createElement("userPasssword",$password);
      $emp->appendChild($passWord);

      $fullAddress=$xml->createElement("userAddress",$address);
      $emp->appendChild($fullAddress);

      $xml->save("users.xml") or die("Error, Unable to creste XML File");

      session_start();
    $_SESSION['registeredFirstName'] = $firstName;
    header('Location: loginProcess.php');
    exit();
    }
 ?>
