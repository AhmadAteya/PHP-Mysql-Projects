<?php include 'database.php'; ?>
<?php include 'layout/header.php'; ?>
<?php 
	/*
	* Get Total Questions
	*/
	$query="SELECT * FROM questions";

	 // Get the results
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total= $results->num_rows;
?>
	<main>
		<div class="container">
			<h2>Test Your PHP Knowledge</h2>
			<p>This is a multiple choice quiz to testyour knowledge of PHP</p>
			<ul>
				<li><strong>Number of Questions: </strong><?php echo $total ; ?></li>
				<li><strong>Type: </strong>Multiple Choice</li>
				<li><strong>Estimated Time: </strong><?php echo $total*.5 ; ?> Mintues</li>
			</ul>
			<a href="question.php?n=1" class="start">Start Quiz</a>
		</div>
	</main>
<?php include 'layout/footer.php'; ?>