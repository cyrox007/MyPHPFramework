<?php
/**
 * @see http://code.google.com/p/iploc
 *
 */

$dir = 'c855721/'; 
$dtime = date('Ymd_His');

if(isset($_POST['name'])) {
    $filename = $dtime.'_'.$_POST['name'].".txt";
	$file = fopen($dir.$filename, "w");
	fclose($file);

	$location = 'edit?src='.$filename;
	header('Location: '.$location);
}
$files = array_diff(scandir($dir), ['.', '..', '.htaccess']);

/**************************************************************
	 QUOTERS
**************************************************************/

?>

<!DOCTYPE html>
<html>
<head>
	<title>Блокнот v1.2</title>
	<link rel="icon" type="image/png" href="./favicon.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/notes/style.css">
</head>
<body>
<form method='post' name="add_file">
	<input type="text" name="name" placeholder="Название файла..." required>
	<input type="submit" name="submit" value="Создать" />
</form>
<div class="notes_list">
	<?php foreach($files as $file): 
    mb_internal_encoding("UTF-8");
    // сколько знаков надо убрать сначала - отрезаем в имени дату и время
    $fname = mb_substr($file, 16);
    // сколько знаков надо убрать в конце строки - щотрезаем расширение .txt
    $fname = mb_substr($fname, 0, -4); 
    ?>
	<div class="notes_list-row"><?php echo "<a class=\"link\" href=\"edit?src={$file}\">{$fname}</a>" ?></div>
	<?php endforeach; ?>
</div>
</body>
</html>

