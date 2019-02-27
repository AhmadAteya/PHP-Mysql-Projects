<?php session_start() ?>
<?php include 'layout/header.php'; ?>
	<main>
		<div class="container">
			<h2>You're Done!</h2>
				<p>Congrats! You have completed the test.</p>
				<p>Final Score: <?php echo $_SESSION['score']; ?></p>
				<a href="question.php?n=1" class="start">Take Again</a>
		</div>
	</main>
<?php include 'layout/footer.php'; ?>
	