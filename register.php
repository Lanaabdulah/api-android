<?php
    require_once ('config.php');

    if ($con) {
        $nip = $_POST['nip'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO `users`(`nip`, `name`, `email`, `password`) VALUES('$nip', '$name', '$email', '$password')";

        if ($nip != "" && $name != "" && $password != "") {
            $result = mysqli_query($con, $query);
            $response = array();
            
            if ($result) {
                array_push($response, array(
                    'status' => 'OK'
                ));
            } else {
                array_push($response, array(
                    'status' => 'FAILED'
                ));
            }
        } else {
            array_push($response, array(
                'status' => 'FAILED'
            ));
        }
    } else {
        array_push($response, array(
            'status' => 'FAILED'
        ));
    }

    echo json_encode(array("server_response" => $response));
    mysqli_close($con);
?>