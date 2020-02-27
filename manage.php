<?php
$teams = [];
$teamsFile = 'teams.txt';
$action = '';
$actions = ['add', 'delete'];
$teams = file($teamsFile, FILE_IGNORE_NEW_LINES);

if (
    !isset($_POST['action']) ||
    !in_array($_POST['action'], $actions) ||
    !is_file($teamsFile)
) {
    header('Location: index.php');
    exit();
}

//$handle = fopen($teamsFile,'w+');
if (!isset($_POST['team-name'])) {
    header('Location: index.php');
    exit();
}

if ($_POST['action'] === 'add') {
    $teamName = $_POST['team-name'];
    $teams[] = $teamName;
} else {
    $teamsName = $_POST['team-name'];
    $teams = array_diff($teams, $teamsName);
}

foreach ($teams as $k => $team) {
    $teams[$k] = $team.PHP_EOL;
}

file_put_contents($teamsFile, $teams);
header('Location: index.php');
