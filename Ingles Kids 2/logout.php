<script>
	localStorage.clear();
	<?php
		session_start();
		session_destroy();
	?>
	window.location.replace("index.php");
</script>