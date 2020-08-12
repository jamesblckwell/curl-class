<?php
declare(strict_types = 1);

if (!class_exists('Curl')) {
    class Curl{

        private static $conn;
        private static $defaults = [
            CURLOPT_HEADER => 0,                    // Include header with request
            CURLOPT_RETURNTRANSFER => 1,            // Return result on curl_exec()
            CURLOPT_TIMEOUT => 4,                   // Set timeout to 4s
        ];
        
        /**
         * Curl::request()
         * Makes a request
         *
         * @param string $method The request method
         * @param string $url The request target
         * @param array $options An array of 
         * @param array $body
         * @return string
         */
        public static function request(string $method, string $url, array $options = [], array $body = []):string {
            self::$conn = curl_init();

            curl_setopt(self::$conn, CURLOPT_URL, $url);
            curl_setopt(self::$conn, CURLOPT_CUSTOMREQUEST, $method);
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
    }
};
?>