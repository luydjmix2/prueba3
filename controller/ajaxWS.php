<?php

/*
 * clase que realiza los procesos de curl para las consultas der ajax con los WS (web service) 
 */

/**
 * Description of ajaxWS
 *
 * @author Luis Erasmo Suarez Rondon
 */
class ajaxWS {

//    se realiza consulta para pedir el token y autenticar la sesion
    function getchallenge() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php?operation=getchallenge&username=prueba",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Accept-Encoding: gzip, deflate",
                "Connection: keep-alive",
                "Host: develop.datacrm.la",
                "Postman-Token: 39408df1-ad3a-44cc-a566-006383a6b02b,5f7ca2e6-c62d-4ad9-866e-cc3376b50aeb",
                "User-Agent: PostmanRuntime/7.19.0",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $arrayJson = json_decode($response);
        $token = $arrayJson->result->token;
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return hash('md5', $token.'55kt1mJbtDFpsw1t');
        }
    }

//    se realiza la creacion de la secion para ptener en nombre de session y poder visualizar los datos
    function login() {
        $token = $this->getchallenge();
        $curl = curl_init();
//        $accesskey = '55kt1mJbtDFpsw1t';
//        $accessKey = md5($token + $accesskey);
//        echo $token;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "operation=login&username=prueba&accessKey=" . $token,
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Accept-Encoding: gzip, deflate",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Content-Length: 74",
                "Content-Type: application/x-www-form-urlencoded",
                "Host: develop.datacrm.la",
                "Postman-Token: 3b714da7-abbd-4fd6-8e8b-0afa4d40bde2,5bd84e36-16d2-4609-b2af-58b243590dd6",
                "User-Agent: PostmanRuntime/7.19.0",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $arrayJson = json_decode($response);
//        $sessionName = $arrayJson->result->sessionName;
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response; 
        }
    }

//    se realiza la consulta de la informacion
    function query($param) {
        $curl = curl_init();
        $userName = $param;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php?operation=query&sessionName=" . $userName . "&query=select%20%2A%20from%20Contacts;",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Accept-Encoding: gzip, deflate",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Host: develop.datacrm.la",
                "Postman-Token: 438973a9-ec4c-4c01-bc55-71ad624b746d,206316aa-adaa-4963-b5c6-bdacd9e13eb0",
                "User-Agent: PostmanRuntime/7.19.0",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

}

?>
