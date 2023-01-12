<?php
    require_once ('config.php');

    if ($con) {
        $id = $_POST['id'];
        $timein = $_POST['timein'];
        $created = $_POST['created'];

        $query = "INSERT INTO `absensis`(`id_users`, `jam_masuk`, `created_at`) VALUES('$id', '$timein', '$created')";

        if ($id != "" && $timein != "") {
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
