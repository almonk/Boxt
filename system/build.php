#!/usr/bin/php
<?php
/*
 * Builds the DataMapper file from the set of files contained in src
 */

// Constants
$src_path = './src';

$build_file = './application/libraries/datamapper.php';

// -------------------------------------------------------

$file_list = scandir($src_path);

foreach($file_list as $index => $name) {
	if(strpos($name, '.') === 0) {
		unset($file_list[$index]);
	}
}

if ( ! $fp = @fopen($build_file, 'w')) {
	die("Error creating file.\n");
}

foreach($file_list as $name) {
	echo("Adding file {$name}...\n");
	$contents = file($src_path . '/' . $name);
	for($i=1; $i < (count($contents)-1); $i++) {
		if(fwrite($fp, $contents[$i]) === FALSE) {
			die("Error writing output!\n");
		}
	}
}
fclose($fp);

// also copies the file to each of the locations specified after $argv[0]
array_shift($argv);
foreach($argv as $arg) {
	copy($build_file, $arg);
}

echo("Done.\n");
