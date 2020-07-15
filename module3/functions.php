<?php

function mb_count_chars($input)
{
	$l = mb_strlen($input, 'UTF-8');
	$unique = array();
	for ($i = 0; $i < $l; $i++) {
		$char = mb_substr($input, $i, 1, 'UTF-8');
		if (!array_key_exists($char, $unique))
			$unique[$char] = 0;
		$unique[$char]++;
	}
	return $unique;
}

function mb_strrev($text)
{
	return join('', array_reverse(
		preg_split('~~u', $text, -1, PREG_SPLIT_NO_EMPTY)
	));
}

function numberOfWords($str)
{
	$arrOfWords = explode(' ', preg_replace('/[^ a-zа-яёі\d]/ui', '', $str));

	return count($arrOfWords);
}

function countSentences($str)
{
	return preg_match_all('/([^\.\!\?]+)/', $str, $match);
}

function frequencyOfCharacters($data)
{
	$count_chars = mb_count_chars($data);
	$data = [];
	foreach ($count_chars as $key => $value) {
		$data[] = [
			'instance' => $value,
			'char' => $key,
		];
	}

	return $data;
}

function distributionOfCharacters($data)
{
	$text = str_replace(' ', '', $data);
	$count = mb_strlen($text);
	$count_chars = mb_count_chars($data);
	$data = [];
	foreach ($count_chars as $key => $value) {
		$percentage = round(($value / $count * 100), 2);
		$data[] = [
			'char' => $key,
			'count' => $value,
			'percentage' => $percentage,
		];
	}

	return $data;
}

function averageWordLength($str)
{
	$arrayOfWords = explode(' ', $str);
	$count_words = count($arrayOfWords);
	$total = 0;
	foreach ($arrayOfWords as $str) {
		$total += mb_strlen($str);
	}

	return intval($total / $count_words);
}

function averageNumberOfWordsInSentence($str)
{
	return intval(numberOfWords($str) / countSentences($str));
}

function topTenWords($str, $which = 'longest')
{
	$i = 0;
	$arrayOfWords = explode(' ', $str);
	$wordsLen = [];
	$data = [];
	foreach ($arrayOfWords as $str) {
		$wordsLen[] = mb_strlen(preg_replace('/[^ a-zа-яёі\d]/ui', '', $str));
	}

	if ($which === 'shortest') {
		asort($wordsLen);
	} else {
		arsort($wordsLen);
	}

	foreach ($wordsLen as $key => $value) {
		if ($i < 10) {
			$data[] = preg_replace('/[^ a-zа-яёі\d]/ui', '', $arrayOfWords[$key]);
		}
		$i++;
	}

	return $data;
}

function topTenSentences($str, $which = 'longest')
{
	$i = 0;
	$explode = explode('.', $str);
	$arrayOfSentences = array_diff($explode, ['']);
	$sentences = [];
	$data = [];

	foreach ($arrayOfSentences as $str) {
		$trimSentence = trim($str, ' ');
		$sentenceToWords = explode(' ', $trimSentence);

		$count = count($sentenceToWords);
		$sentences[$trimSentence] = $count;
	}

	if ($which === 'shortest') {
		asort($sentences);
	} else {
		arsort($sentences);
	}

	foreach ($sentences as $key => $sentence) {
		if ($i < 10) {
			$data[] = trim($key);
		}
		$i++;
	}

	return $data;
}

function numberOfPalindromeWords($str)
{
	$arrayOfWords = explode(' ', $str);
	$count = 0;
	$palindromeWords = '';
	foreach ($arrayOfWords as $word) {
		if (isPalindromeWord($word)) {
			$palindromeWords .= $word . ', ';
			$count += 1;
		}
	}
	return $count . ' - [' . trim($palindromeWords, ', ') . ']';
}

function topTenLongestPalindromeWords($str)
{
	$arrayOfWords = explode(' ', $str);
	$longestPalindrome = [];
	$palindromeWords = [];
	$i = 0;
	$data = [];

	foreach ($arrayOfWords as $word) {
		if (isPalindromeWord($word)) {
			$palindromeWords[] = trim($word);
		}
	}

	foreach ($palindromeWords as $palindromeWord) {
		$longestPalindrome[strtolower($palindromeWord)] = mb_strlen($palindromeWord);
	}

	arsort($longestPalindrome);

	foreach ($longestPalindrome as $key => $value) {
		if ($i < 10) {
			$data[] = $key;
		}
		$i++;
	}

	return $data;
}

function isPalindromeWord($str)
{
	$textWithoutSpaces = preg_replace('/[^ a-zа-яёі\d]/ui', '', strtolower(str_replace(' ', '', $str)));
	$isPalindrome = false;

	if (mb_strlen($textWithoutSpaces) > 2) {
		if ($textWithoutSpaces == mb_strrev($textWithoutSpaces)) {
			$isPalindrome = true;
		}
	}

	return $isPalindrome;
}

function reverseText($str)
{
	$srtToArray = explode(' ', $str);

	return implode(' ', array_reverse($srtToArray));
}
