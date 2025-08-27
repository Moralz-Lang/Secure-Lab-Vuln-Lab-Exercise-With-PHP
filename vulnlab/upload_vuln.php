<form method="post" enctype="multipart/form-data">
<input type="file" name="file">
<button type="submit">Upload</button>
</form>

<?php
if ($_FILES['file']['tmp_name']){
    move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$_FILES['file']['name']);
    echo "Uploaded ".$_FILES['file']['name'];
}
