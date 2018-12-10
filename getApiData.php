<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
    if (isset($_POST['userEmail'])) {
        $userEmail = strip_tags($_POST['userEmail']);
        if (strlen($userEmail) > 50) {
            echo 'Too Long Input';
        }else {
            $email = $_POST['userEmail'];
            $service_url = 'https://supermarketsecurity.000webhostapp.com/api/user/readByEmail.php?email='.$email;
            $curl = curl_init($service_url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $curl_response = curl_exec($curl);
            if ($curl_response === false) {
                $info = curl_getinfo($curl);
                curl_close($curl);
                die('error occured during curl exec. Additioanl info: ' . var_export($info));
            }
            curl_close($curl);
            $decoded = json_decode($curl_response);
            header('location: Table.php?data='.print_r($decoded));

        }

    }
} else {
    header('location: index.php');
}

