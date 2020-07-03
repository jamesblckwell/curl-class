<?php 
if(!class_exists("Curl")) {
    class Curl{

        private static $conn;
        private static $defaults = [
            CURLOPT_HEADER => 0,                                        //Include header with request
            CURLOPT_RETURNTRANSFER => 1,                                //
            CURLOPT_TIMEOUT => 4,                                       //
        ];

        /**
         * Initialises and executes a GET request using CURL
         * 
         * @param string $url The request URL
         * @param array $options An associative array of CURLOPTs
         * 
         * @return $return The return from the request
         */
        public static function get($url, $options = []) {
            self::$conn = curl_init();

            curl_setopt(self::$conn, CURLOPT_URL, $url);
            curl_setopt_array(self::$conn, (array) self::$defaults + (array) $options);
            try {
                $result = curl_exec(self::$conn);
                if (!$result) {
                    throw new Exception();
                }
            } catch(Exception $e) {
                echo curl_errno(self::$conn).' - '.curl_error(self::$conn);
            }
            curl_close(self::$conn);

            return $result;
        }

        /**
         * Initialises and executes a POST request using CURL
         * 
         * @param string $url The request URL
         * @param array $options An associative array of CURLOPTs
         * @param array $body The POST body
         * 
         * @return $return The return from the request
         */
        public static function post($url, $options=[], $body = null) {
            self::$conn = curl_init();

            curl_setopt(self::$conn, CURLOPT_URL, $url);
            curl_setopt(self::$conn, CURLOPT_POSTFIELDS, $body);
            curl_setopt_array(self::$conn, (array) self::$defaults + (array) $options);
            try {
                $result = curl_exec(self::$conn);
                if (!$result) {
                    throw new Exception();
                }
            } catch(Exception $e) {
                echo curl_errno(self::$conn).' - '.curl_error(self::$conn);
            }
            curl_close(self::$conn);
            return $result;

        }

        /**
         * Initialises and executes a PATCH request using CURL
         * 
         * @param string $url The request URL
         * @param array $options An associative array of CURLOPTs
         * @param array $body The PATCH body
         * 
         * @return $return The return from the request
         */
        public static function patch($url, $options=[], $body = null) {
            self::$conn = curl_init();

            curl_setopt(self::$conn, CURLOPT_URL, $url);
            curl_setopt(self::$conn, CURLOPT_POSTFIELDS, $body);
            curl_setopt(self::$conn, CURLOPT_CUSTOMREQUEST, 'PATCH');
            curl_setopt_array(self::$conn, (array) self::$defaults + (array) $options);

            try {
                $result = curl_exec(self::$conn);
                if (!$result) {
                    throw new Exception();
                }
            } catch(Exception $e) {
                echo curl_errno(self::$conn).' - '.curl_error(self::$conn);
            }
            curl_close(self::$conn);
            return $result;
        }
    }
}

?>
