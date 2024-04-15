<?php
include_once '../db/dbProjects.php';

$db = new Database('../db/projects.sqlite');

$projects = $db ->listeRecords();
echo json_encode($projects);
?>