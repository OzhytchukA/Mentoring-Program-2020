<?php require_once 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="main">
	<div class="form">
		<h1>PHP Basics homework</h1>
		<form method="get">
			<textarea rows="4" cols="50" name="text" placeholder="Enter text here..."></textarea>
			<div><input type="submit"></div>
		</form>
	</div>
	<?php if (isset($_GET) && !empty($_GET)) : ?>
	<div class="content">
		<h3><?= $_GET['text']; ?></h3>
		<div>
			<strong>Number of characters:</strong>
			<?= mb_strlen($_GET['text']); ?>
		</div>

		<div>
			<strong>Number of words:</strong>
			<?= numberOfWords($_GET['text']); ?>
		</div>

		<div>
			<strong>Number of sentences:</strong>
			<?= countSentences($_GET['text']); ?>
		</div>

		<div>
			<strong>Frequency of characters:</strong>
			<ul>
				<?php foreach (frequencyOfCharacters($_GET['text']) as $value) : ?>
					<li>There were <?= $value['instance'] ?> instance(s) of "<?= $value['char'] ?>" in the string.</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div>
			<strong>Distribution of characters as a percentage of total:</strong>
			<ul>
				<?php foreach (distributionOfCharacters($_GET['text']) as $value) : ?>
					<li>Letter "<?= $value['char'] ?>" occurs <?= $value['count'] ?> time(s)
						- <?= $value['percentage'] ?>%
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div>
			<strong>Average word length:</strong>
			<?php echo averageWordLength($_GET['text']); ?>
		</div>

		<div>
			<strong>The average number of words in a sentence:</strong>
			<?php echo averageNumberOfWordsInSentence($_GET['text']); ?>
		</div>

		<div>
			<strong>Top 10 longest words:</strong>
			<ol>
				<?php foreach (topTenWords($_GET['text']) as $value) : ?>
					<li><?= $value ?></li>
				<?php endforeach; ?>
			</ol>
		</div>

		<div>
			<strong>Top 10 shortest words:</strong>
			<ol>
				<?php foreach (topTenWords($_GET['text'], 'shortest') as $value) : ?>
					<li><?= $value ?></li>
				<?php endforeach; ?>
			</ol>
		</div>

		<div>
			<strong>Top 10 longest sentences:</strong>
			<ol>
				<?php foreach (topTenSentences($_GET['text']) as $value) : ?>
					<li><?= $value ?></li>
				<?php endforeach; ?>
			</ol>
		</div>

		<div>
			<strong>Top 10 shortest sentences:</strong>
			<ol>
				<?php foreach (topTenSentences($_GET['text'], 'shortest') as $value) : ?>
					<li><?= $value ?></li>
				<?php endforeach; ?>
			</ol>
		</div>

		<div>
			<strong>Number of palindrome words:</strong>
			<?php echo numberOfPalindromeWords($_GET['text']); ?>
		</div>

		<div>
			<strong>Top 10 longest palindrome words:</strong>
			<ol>
				<?php foreach (topTenLongestPalindromeWords($_GET['text']) as $value) : ?>
					<li><?= $value ?></li>
				<?php endforeach; ?>
			</ol>
		</div>

		<div>
			<strong>Is the whole text a palindrome? (Without whitespaces and punctuation marks.):</strong>
			<?php echo isPalindromeWord($_GET['text']) ? 'Yes' : 'No'; ?>
		</div>

		<div>
			<strong>Report was generated at:</strong>
			<?php echo date('n/j/Y - g:i A'); ?>
		</div>

		<div>
			<strong>The reversed text:</strong>
			<?php echo mb_strrev($_GET['text']); ?>
		</div>

		<div>
			<strong>The reversed text but the character order in words kept intact:</strong>
			<?php echo reverseText($_GET['text']); ?>
		</div>
		<?php endif; ?>
	</div>
</div>
</body>
</html>
