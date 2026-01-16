<?php
        session_start();
	@session_unset($_SESSION['username']);
	@session_destroy($_SESSION['username']);
	echo "<script>document.location='index.php';</script>";
?>