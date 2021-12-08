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


    // $xmltemp = file_get_contents('users.xml');
    // if(strpos($xmltemp,$useremail)!==false)
    // {
    //     echo 'Errooooor';
    // }


         $file = "users.xml";
         $simplexml = simplexml_load_file($file);

        $users = $simplexml->users; 
        $user= $users->addChild('user');

        $user->addChild('firstName',$firstName);
        $user->addChild('lastName',$lastName);
        $user->addChild('useremail',$useremail);
        $user->addChild('passWord',md5($password));
        $user->addChild('street',$street);
        $user->addChild('city',$city);
        $user->addChild('province',$province);
        $user->addChild('zipcode',$zipcode);

        $simplexml->asXML($lastName . $firstName . '.xml');
        $simplexml->asXML($file);
        header("Location: " .$lastName . $firstName . ".xml");
        die;
        //header("Location: ".$_SERVER['HTTP_REFERER']);
        //header("Location: random.html");


    

}

?>