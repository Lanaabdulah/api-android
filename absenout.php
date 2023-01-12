<?php
    require_once ('config.php');

    if ($con) {
        $id = $_POST['id'];
        $timeout = $_POST['timeout'];
        $updated = $_POST['updated'];

        $query = "UPDATE `absensis` SET `jam_pulang`='$timeout', `updated_at`='$updated' WHERE  `id_users`='$id' AND `created_at`='$updated'";

        if ($id != "" && $timeout != "") {
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
