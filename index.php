<?php

require_once "functions.php";

$action = $_GET['action'] ?? 'main';

switch ($action) {
    case "create":
        if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['age']) || empty($_POST['sex']) || empty($_POST['salary']) || empty($_POST['departments'])) {
            die("Data should not be empty");
        }
        createContact($_POST['name'], $_POST['phone'], $_POST['age'], $_POST['sex'], $_POST['salary'], $_POST['department']);
        break;
    case "main":
    default:
        showTableForm();
        showContactBook();
        break;
}








