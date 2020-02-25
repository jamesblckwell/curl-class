<?php 

class Curl{

    private static $conn;
    private static $defaults = [
        CURLOPT_HEADER => 0,                                        //Include header with request
        CURLOPT_RETURNTRANSFER => 1,                                //
        CURLOPT_TIMEOUT => 4,                                       //
    ];

    public function __construct($url, $options, $req_method, $body) {
        $this->url = $url;
        $this->options = $options;

        $this->init();
    }

    public function set_options($conn){
        
    }

    /**
     * Initialises and executes a GET request using CURL
     * 
     * @param string $url The request URL
     * @param array $options An associative array of CURLOPTs
     * 
     * @return $return The return from the request
     */
    public static function get($url, $options = []) {
        $conn = curl_init();

        curl_setopt($conn, CURLOPT_URL, $url);
        curl_setopt_array($conn, (array) self::$defaults + (array) $options);
        try {
            $result = curl_exec($conn);
            if (!$result) {
                throw new Exception();
            }
        } catch(Exception $e) {
            echo curl_errno($conn).' - '.curl_error($conn);
        }
        curl_close($conn);
    
        return $result;
    }

    public static function post($url, $options=[], $body = null) {
        $conn = curl_init();

        curl_setopt($conn, CURLOPT_URL, $url);
        curl_setopt($conn, CURLOPT_POSTFIELDS, $body);
        curl_setopt_array($conn, (array) self::$defaults + (array) $options);
        try {
            $result = curl_exec($conn);
            if (!$result) {
                throw new Exception();
            }
        } catch(Exception $e) {
            echo curl_errno($conn).' - '.curl_error($conn);
        }
        curl_close($conn);
        return $result;
        
    }

    public static function patch($url, $options=[], $body = null) {
        $conn = curl_init();

        curl_setopt($conn, CURLOPT_URL, $url);
        curl_setopt($conn, CURLOPT_POSTFIELDS, $body);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt_array($conn, (array) self::$defaults + (array) $options);
        try {
            $result = curl_exec($conn);
            if (!$result) {
                throw new Exception();
            }
        } catch(Exception $e) {
            echo curl_errno($conn).' - '.curl_error($conn);
        }
        curl_close($conn);
        return $result;
    }

}

?>