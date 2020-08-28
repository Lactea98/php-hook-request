<?php
    function notification($headers, $ip, $uri){
        require __DIR__ . '/vendor/autoload.php';
    
        $options = array(
            'cluster' => 'ap3',
            'useTLS' => true
        );
        $pusher  = new Pusher\Pusher('bdb20bb530e35bc74e84', '72a4195ac6e579d9096f', '1062466', $options);
        
        $result = array();
        // print_r(apache_request_headers());
        foreach ($headers as $header => $value) {
            $result[htmlspecialchars($header)] = htmlspecialchars($value);
            // echo $header.": ". htmlspecialchars($value) ."<br />";
        }
        
        $result["0"] = ($_SERVER["REQUEST_METHOD"] == "GET") ? "GET ".$_SERVER['REQUEST_URI']  : "POST ".$_SERVER['REQUEST_URI'];
        $result["ip"] = $ip;
        $result["uri"] = $uri;
        $data['message'] = $result;
        $pusher->trigger('my-channel', 'my-event', $data);
    }
?>