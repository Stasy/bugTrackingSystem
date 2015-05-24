<?php

class init {

    public function CreateTables(){

        $config = new roboBugConfig();

        $connectionId = mysql_connect($config->dbhost, $config->dbuser, $config->dbpassword);
        if($connectionId)
            echo 'Соединение установлено<br>';
        else
            die('При подключении к серверу базы данных произошла ошибка<br>');

        if(!mysql_select_db($config->dbname, $connectionId))
            echo "База данных $config->dbname не найдена<br>";

        $createUsersTableQuery = "create table $config->usersTableName (user_id int(10) AUTO_INCREMENT, user_name varchar(30) NOT NULL, projects varchar(2000) NOT NULL, PRIMARY KEY (user_id))";
        $createProjectsTableQuery = "create table $config->projectsTableName (project_id int(10) AUTO_INCREMENT, project_name varchar(30) NOT NULL, users varchar(2000) NOT NULL, PRIMARY KEY (project_id))";
        $createIssuesTableQuery = "create table $config->issuesTableName (bug_id int(10) AUTO_INCREMENT, caption varchar(1000) NOT NULL, content varchar(5000) NOT NULL, status varchar(20) NOT NULL, priority varchar(20) NOT NULL, project varchar(20) NOT NULL, author varchar(20) NOT NULL, currentUser varchar(20) NOT NULL, PRIMARY KEY (bug_id))";

        if(mysql_query($createUsersTableQuery, $connectionId))
            echo "Создание таблицы пользователей завершено<br>";
        else
            echo "Не удалось создать таблицу пользователей<br>";

        if(mysql_query($createProjectsTableQuery, $connectionId))
            echo "Создание таблицы проектов завершено<br>";
        else
            echo "Не удалось создать таблицу проектов<br>";

        if(mysql_query($createIssuesTableQuery, $connectionId))
            echo "Создание таблицы багов завершено<br>";
        else
            echo "Не удалось создать таблицу багов<br>";

        mysql_close($connectionId);
    }
}