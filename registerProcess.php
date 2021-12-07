<?php

if(isset($_POST['Register']))
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $useremail = $_POST['emailAddress'];
    $password = $_POST['passWord'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];


         $file = "users.xml";
         $simplexml = simplexml_load_file($file);

         $users = $simplexml->users; 
         $user= $users->addChild('user');

        //$simplexml = new SimpleXMLElement('<user></user>');
        $simplexml->addChild('firstName',$firstName);
        $simplexml->addChild('lastName',$lastName);
        $simplexml->addChild('useremail',$useremail);
        $simplexml->addChild('passWord',md5($password));
        $simplexml->addChild('street',$street);
        $simplexml->addChild('city',$city);
        $simplexml->addChild('province',$province);
        $simplexml->addChild('zipcode',$zipcode);

        //$simplexml->asXML('users/'. $lastName . '.xml');
        $simplexml->asXML($file);

        //header("Location: random.html");
        die;
        //header("Location: ".$_SERVER['HTTP_REFERER']);



  // $xml = simplexml_load_file("xml/users.xml") or die("Error: Cannot create object");
  // $useremail = $users->useremail; 
  // $password = $users->md5(passWord);
}

?>