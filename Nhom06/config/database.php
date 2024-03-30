<?php
    class Database {
        public static function database(){
            $db = new PDO("mysql: host=localhost; dbname=ql_anvat; charset=utf8","root","");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
    }
?>