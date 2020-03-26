<?php

    return new \PDO('mysql:host=mysql.perfil.alphage.com.br;dbname=perfil;charset=utf8', 'perfil', 'jlkb3302', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']);