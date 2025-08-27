<form method="post" action="csrf_vuln.php">
<input type="hidden" name="amount" value="1000">
<button type="submit">Transfer $1000</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo "Transferred $".$_POST['amount']."!";
}
