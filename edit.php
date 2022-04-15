<?php
$dir = 'c855721/';

$filename = isset($_GET['src']) ? $_GET['src'] : die('Не указано имя файла!');
if(!is_file($dir.$filename)) {
	die('Файл не найден!');
}

$contents = file_get_contents($dir.$filename);
if(isset($_POST['submit']))
{
	$handle = fopen($dir.$filename, "w");
	fwrite($handle, $_POST['notes']);
	fclose($handle);
    
    // копируем в архив при изменениях]
    $back = 'bacup_archiv';
    $time = date('H-i-s');
    copy($dir.$filename, $back.'/'.$filename.'_'.$time.'.txt');

	$location = 'edit?src='.$filename;
	header('Location: '.$location);
	exit;

} elseif(isset($_POST['delete']) && $_POST['delete'] === '1') {
	unlink($dir.$filename);
	header('Location: /notes');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?= $filename ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="./favicon.png"/>
</head>
<body>
<form method='post' name="save_file">
	<div class="container">
		<div class="panel">
			<a class="link" href="/notes">На главную</a>
			<button type="sumbit" name="delete" value="1">Удалить</button>
			<input type="submit" name="submit" value="Сохранить" />
		</div>
		<textarea name="notes"><?=$contents;?></textarea>
	</div>
</form>
</body>
</html>
