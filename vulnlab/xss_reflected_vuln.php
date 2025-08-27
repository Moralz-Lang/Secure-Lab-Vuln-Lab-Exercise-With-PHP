<?php
$name = $_GET['name'] ?? '';
echo "Hello, $name!";
?>

<form>
<input type="text" name="name">
<button type="submit">Submit</button>
</form>
