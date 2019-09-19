<?php
    // if(isset($_POST['submit'])){
    //     $data = file_get_contents('members-details.json');
    //     $data_array = json_decode($data);
    //     //data in our POST
    //     $input = array(
    //         'username' => $_POST['username'],
    //         'firstname' => $_POST['firstname'],
    //         'lastname' => $_POST['lastname'],
    //         'email' => $_POST['email'],
    //         'phonenumber' => $_POST['phonenumber'],
    //         'password' => $_POST['password']
    //     );
    //     //append the POST data
    //     $data_array[0] = $input;
    //     //return to json and put contents to our file
    //     $data_array = json_encode($data_array, JSON_PRETTY_PRINT);
    //     file_put_contents('members-details.json', $data_array);
    //     $_SESSION['message'] = 'Data successfully appended';
    // }
    // else{
    //     // $_SESSION['message'] = 'Fill up add form first';
    //     // echo("<h1>Welcome </h1> $username");
    // }
    
    if(isset($_POST['submit'])) {
        if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
            $params = array('firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname']);
    
            $jsonObject = json_encode($params);
            $json = file_get_contents('members-details.json');

            if(empty($json)){
                $jsonObject = json_encode(array('username' => [$jsonObject]));
                file_put_contents('members-details.json', $jsonObject);
            }else{
                $json = json_decode($json, true);
                $newJson = $json['username'][0] . "," . $jsonObject;
                $jsonObject = json_encode(array('username' => [$newJson]));
                file_put_contents('members-details.json', $jsonObject);
            }
        }
        else {
            echo "Noooooooob";
        }
}


// Functions to filter user inputs
function filterEmail($field){
    // Sanitize e-mail address
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    
    // Validate e-mail address
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    } else{
        return FALSE;
    }
}

// Define variables and initialize with empty values
$emailErr = "";
$email = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate email address
    if(empty($_POST["email"])){
        $emailErr = "Please enter your email address.";     
    } else{
        $email = filterEmail($_POST["email"]);
        if($email == FALSE){
            $emailErr = "Please enter a valid email address.";
        }
        else {
            $email_split = explode("@", $email);
            $username = $email_split[0];
            echo("<h1>Welcome $username</h1>");
        };
    }
}
?>
