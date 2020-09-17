<?php

// namespace App\Core\Database;


class Connection
{

    public static function make($config)
    {

        try {

            return new PDO(
                $config['database']['connection'].
                ';dbname='.$config['database']['name'],
                $config['database']['user'],
                $config['database']['password'],
                $config['database']['options']
            );
        
        } catch (\PDOException $e) {
    
            echo ($e->message());
    
        }

    }

}