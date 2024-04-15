<?php
require_once '../db/dbProjects.php';

    // Пример использования
    $db = new Database('projects.sqlite');

    $jsonData = file_get_contents('../data/projects.json');
    $projects = json_decode($jsonData, true);

    foreach ($projects as $project) {
        $db->insertRecord($project['title'], $project['img'], $project['description'], $project['link']);
    }
?>