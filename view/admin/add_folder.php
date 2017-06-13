<!DOCTYPE html>
<html>
<script src="js/angular.min.js"></script>
<body>

<form action="" method="post">
	<input type="text" name="folder">
	<input type="submit" name="Submit" value="create">
</form>
<?php
$dir = "../newIFGF/img/";

$files = array_diff(scandir($dir), array('.', '..'));
print_r ($files);

// Prepare the select box to echo
echo "<select name=\"files\">";

foreach ($files as $file)
{
// Return files only
//if ( is_file($dir. $file) )
echo "<option value=\"$file\">$file</option>";
}

echo "</select>";


if(isset($_POST['Submit'])){
	$folder = $_POST['folder'];
	if (!file_exists('../newIFGF/img/'.$folder.'')){mkdir('../newIFGF/img/'.$folder.'', 0777, true);}
	else {echo "Folder already exist";}
}

echo "<option value='{$file}'" . ($pageImage == $file ? " selected" : "") . ">{$file}</option>";
echo '<option value="' . $file . '"' . ($pageImage == $file ? " selected" : "") . '>' . $file . '</option>';
?>
</body>
</html>