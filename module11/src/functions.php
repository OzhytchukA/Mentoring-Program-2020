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

function mb_str_rev($text)
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
		$data[$key] = $value;
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
		$data[$key] = $percentage;
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

function topTenWords($str, $sortAsc = true)
{
	$pattern = '/[^ a-zа-яёі\d]/ui';
	$i = 0;
	$arrayOfWords = explode(' ', $str);
	$words = [];
	$data = [];

	foreach ($arrayOfWords as $str) {
		$trimStr = preg_replace($pattern, '', $str);
		$words[] = [ 'len' => mb_strlen($trimStr), 'word' => $trimStr];
	}

	array_multisort($words, $sortAsc ? SORT_ASC : SORT_DESC);

	foreach ($words as $value) {
		if (!empty($value['word'])) {
			if ($i < 10) {
				$data[] = preg_replace($pattern, '', $value['word']);
			}
			$i++;
		}
	}

	return $data;
}

function topTenSentences($str, $sortAsc = true)
{
	$i = 0;
	$explode = explode('.', $str);
	$arrayOfSentences = array_diff($explode, ['']);
	$sentences = [];
	$data = [];

	foreach ($arrayOfSentences as $str) {
		$trimStr = trim($str);
		$sentences[$trimStr] = numberOfWords($trimStr);
	}

	$sortAsc ? asort($sentences) : arsort($sentences);

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

	foreach ($arrayOfWords as $word) {
		$count += isPalindromeWord($word) ? 1 : 0;
	}

	return $count ?? 0;
}

function topTenLongestPalindromeWords($str)
{
	$arrayOfWords = explode(' ', $str);
	$longestPalindrome = [];
	$palindromeWords = [];
	$i = 0;
	$data = [];

	foreach ($arrayOfWords as $word) {
		if (isPalindromeWord(trim($word))) {
			$palindromeWords[] = $word;
		}
	}

	foreach ($palindromeWords as $palindromeWord) {
		$longestPalindrome[$palindromeWord] = mb_strlen($palindromeWord);
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
	$textWithoutSpaces = preg_replace('/[^ a-zа-яёі\d]/ui', '', str_replace(' ', '', mb_strtolower($str)));
	$isPalindrome = false;

	if (mb_strlen($textWithoutSpaces) > 2) {
		if ($textWithoutSpaces == mb_str_rev($textWithoutSpaces)) {
			$isPalindrome = true;
		}
	}

	return $isPalindrome;
}

function reverseText($str)
{
	$encoding = iconv('utf-8', 'utf-16le', $str);

	return iconv('utf-16be', 'utf-8', strrev($encoding));
}

function reverseWords($str)
{
	$srtToArray = explode(' ', $str);

	return implode(' ', array_reverse($srtToArray));
}
