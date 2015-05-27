<?php

class addRowClass {

    public function addRow($config, $addRowScript){

        $connectionId = $this->dbConnect($config);

        if(mysql_query($addRowScript, $connectionId))
            echo "Row wos added<br>";
        else
            echo "Row wos'nt added<br>";

        mysql_close($connectionId);
    }

    public function dbConnect($config)
    {
        $connectionId = mysql_connect($config->dbhost, $config->dbuser, $config->dbpassword);

        if(!mysql_select_db($config->dbname, $connectionId))
            echo "База данных $config->dbname не найдена<br>";

        return $connectionId;
    }
}