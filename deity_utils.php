<?php

    require_once("../config.php");

    $base_url = 'https://wp24-deities.colca.mornie.org';

    function get_access_token()
    {
        global $config, $base_url;

        $token_url = $base_url . '/token';
        $params = [
            'grant_type' => 'client_credentials',
            'client_id' => $config['deities_client_id'],
            'client_secret' => $config['deities_client_secret']
        ];

        $url = $token_url . '?' . http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        $token = json_decode($res, true);
        curl_close($ch);


        return $token['access_token'];
    }

    function get_random_deity()
    {
        global $base_url;


        $random_url = $base_url . '/random';
        $token = get_access_token();
        $headers = [
           "Authorization: Bearer $token",
           "Access-Control-Request-Method: GET"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $random_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $deity = json_decode(curl_exec($ch), true);
        curl_close($ch);

        return $deity;
    }
?>
