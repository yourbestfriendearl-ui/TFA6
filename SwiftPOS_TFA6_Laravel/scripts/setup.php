<?php
// Run from the project root: php scripts/setup.php
$root = dirname(__DIR__);
foreach (['bootstrap/cache', 'storage/framework/cache/data', 'storage/framework/sessions', 'storage/framework/views', 'storage/logs'] as $directory) {
    $path = $root.'/'.$directory;
    if (!is_dir($path) && !mkdir($path, 0775, true) && !is_dir($path)) {
        throw new RuntimeException('Could not create '.$path);
    }
}
if (!file_exists($root.'/.env')) {
    copy($root.'/.env.example', $root.'/.env');
}
if (!file_exists($root.'/database/database.sqlite')) {
    touch($root.'/database/database.sqlite');
}
echo "Local environment and storage directories are ready.\n";
