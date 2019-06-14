<?php

/**
 * Connexion à la base de données
 */
const DB_HOST = "localhost";
const DB_PORT = 3306;
const DB_NAME = "sample_blog";
const DB_USER = "root";
const DB_PSWD = "";

$bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8;port=' . DB_PORT, DB_USER, DB_PSWD);