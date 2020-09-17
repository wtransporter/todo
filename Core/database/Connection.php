<?php

namespace App\Core\Database;

Use PDO;

class Connection
{
    /**
     * Make connection to DB
     * 
     * @param $config configuration file
     */
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