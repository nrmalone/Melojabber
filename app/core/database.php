<?php

class Database
{
    public function db_connect()
    {
        try {
            $string = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";";
            return $db = new PDO($string, DB_USER, DB_PASS);
        } catch (PDOException $e)
        {
            error_log("Unable to connect to " . DB_NAME);
        }
    }

    public function read($query, $data=[])
    {
        $DB = $this->db_connect();
        $statement = $DB->prepare($query);

        if (count($data) == 0) {
            $statement = $DB->query($query);
            $check = 0;
            if ($statement) {
                $check = 1;
            }
        } else {
            $check = $statement->execute($data);
        }

        if ($check)
        {
            $data = $statement->fetchAll(PDO::FETCH_OBJ);
            if (is_array($data) && count($data) > 0)
            {
                return $data;
            }
            return false;
        } else {
            return false;
        }
    }

    public function write($query, $data=[])
    {
        $DB = $this->db_connect();
        $statement = $DB->prepare($query);

        if (count($data) == 0) {
            $statement = $DB->query($query);
            $check = 0;
            if ($statement) {
                $check = 1;
            }
        } else {
            $check = $statement->execute($data);
        }

        if ($check)
        {
            return true;
        } else {
            return false;
        }
    }

}