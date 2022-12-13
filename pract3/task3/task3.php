<?php
require_once 'File.php';
require_once 'Directory.php';
require_once 'Disk.php';

$disk = new Disk('C:');
for ($i = 0; $i < 23; $i++){
    $dir = new PHPDirectory('dir');
    for ($k = 0; $k < 3; $k++) {
        $dir->add(new File('file'));
    }
    $disk->add($dir);
}
echo $disk->display();