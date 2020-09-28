<?php
/**
 * Text Analyzer functions
 *
 * PHP version 7.4.5
 *
 * @category Mentorship
 * @package  MentorshipModule11
 * @author   Andrii Ozhytchuk <andrii_ozhytchuk@epam.com>
 * @license  PHP License 3.01
 * @link     https://github.com/ozhytchukA
 */

/**
 * Return information about characters used in a string (multibyte)
 *
 * @param string $input string
 *
 * @return array<string, int>
 */
function mbCountChars(string $input)
{
    $stringLength = mb_strlen($input, 'UTF-8');
    $unique = array();

    for ($i = 0; $i < $stringLength; $i++) {
        $char = mb_substr($input, $i, 1, 'UTF-8');
        if (!array_key_exists($char, $unique)) {
            $unique[$char] = 0;
        }
        $unique[$char]++;
    }

    return $unique;
}

/**
 * Reverse a string (multibyte)
 *
 * @param string $str text
 *
 * @return string
 */
function mbStrRev(string $str)
{
    return join('', array_reverse(preg_split('~~u', $str, -1, PREG_SPLIT_NO_EMPTY)));
}

/**
 * Counts the number of words
 *
 * @param string $str a string
 *
 * @return int
 */
function numberOfWords(string $str)
{
    $arrOfWords = explode(' ', preg_replace('/[^ a-zа-яёі\d]/ui', '', $str));

    return count($arrOfWords);
}

/**
 * Count of sentences
 *
 * @param string $str a string
 *
 * @return false|int
 */
function countSentences(string $str)
{
    return preg_match_all('/([^\.\!\?]+)/', $str);
}

/**
 * Frequency of characters
 *
 * @param string $data a string
 *
 * @return array<string, int>
 */
function frequencyOfCharacters(string $data)
{
    $countOfChars = mbCountChars($data);
    $data = [];

    foreach ($countOfChars as $key => $value) {
        $data[$key] = $value;
    }

    return $data;
}

/**
 * Distribution of characters
 *
 * @param string $data a string
 *
 * @return array<string, float>
 */
function distributionOfCharacters(string $data)
{
    $text = str_replace(' ', '', $data);
    $count = mb_strlen($text);
    $countOfChars = mbCountChars($data);
    $data = [];

    foreach ($countOfChars as $key => $value) {
        $percentage = round(($value / $count * 100), 2);
        $data[$key] = $percentage;
    }

    return $data;
}

/**
 * Average word length
 *
 * @param string $str a string
 *
 * @return int
 */
function averageWordLength(string $str)
{
    $arrayOfWords = explode(' ', $str);
    $countOfWords = count($arrayOfWords);
    $total = 0;

    foreach ($arrayOfWords as $str) {
        $total += mb_strlen($str);
    }

    return intval($total / $countOfWords);
}

/**
 * Average number of words in the sentence
 *
 * @param string $str a string
 *
 * @return int
 */
function averageNumberOfWordsInSentence(string $str)
{
    return intval(numberOfWords($str) / countSentences($str));
}

/**
 * Top ten words
 *
 * @param string $str     a string
 * @param bool   $sortAsc which (longest or shortest)
 *
 * @return array<int, string|null>
 */
function topTenWords(string $str, $sortAsc = true)
{
    $pattern = '/[^ a-zа-яёі\d]/ui';
    $counter = 0;
    $arrayOfWords = explode(' ', $str);
    $words = [];
    $data = [];

    foreach ($arrayOfWords as $str) {
        $trimStr = preg_replace($pattern, '', $str);
        $words[] = ['len' => mb_strlen($trimStr), 'word' => $trimStr];
    }

    array_multisort($words, $sortAsc ? SORT_ASC : SORT_DESC);

    foreach ($words as $value) {
        if (!empty($value['word'])) {
            if ($counter < 10) {
                $data[] = preg_replace($pattern, '', $value['word']);
            }
            $counter++;
        }
    }

    return $data;
}

/**
 * Top ten sentences
 *
 * @param string $str     a string
 * @param bool   $sortAsc which (longest or shortest)
 *
 * @return array<int>
 */
function topTenSentences(string $str, $sortAsc = true)
{
    $counter = 0;
    $explode = explode('.', $str);
    $arrayOfSentences = array_diff($explode, ['']);
    $sentences = [];
    $data = [];

    foreach ($arrayOfSentences as $str) {
        $trimStr = trim($str);
        $sentences[$trimStr] = numberOfWords($trimStr);
    }

    $sortAsc ? asort($sentences) : arsort($sentences);

    foreach ($sentences as $key) {
        if ($counter < 10) {
            $data[] = $key;
        }
        $counter++;
    }

    return $data;
}

/**
 * The function counts the number of palindrome words
 *
 * @param string $str a string
 *
 * @return int
 */
function numberOfPalindromeWords(string $str)
{
    $arrayOfWords = explode(' ', $str);
    $count = 0;

    foreach ($arrayOfWords as $word) {
        $count += isPalindromeWord($word) ? 1 : 0;
    }

    return $count ?? 0;
}

/**
 * Top ten longest palindrome words
 *
 * @param string $str a string
 *
 * @return array<int>
 */
function topTenLongestPalindromeWords(string $str)
{
    $arrayOfWords = explode(' ', $str);
    $longestPalindrome = [];
    $palindromeWords = [];
    $counter = 0;
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

    foreach ($longestPalindrome as $key) {
        if ($counter < 10) {
            $data[] = $key;
        }
        $counter++;
    }

    return $data;
}

/**
 * Checking if the word is a palindrome
 *
 * @param string $str a string
 *
 * @return bool
 */
function isPalindromeWord(string $str)
{
    $textWithoutSpaces = preg_replace(
        '/[^ a-zа-яёі\d]/ui', '', str_replace(' ', '', mb_strtolower($str))
    );
    $isPalindrome = false;

    if (mb_strlen($textWithoutSpaces) > 2) {
        if ($textWithoutSpaces == mbStrRev($textWithoutSpaces)) {
            $isPalindrome = true;
        }
    }

    return $isPalindrome;
}

/**
 * Reverse text
 *
 * @param string $str a string
 *
 * @return false|string
 */
function reverseText(string $str)
{
    $encoding = iconv('utf-8', 'utf-16le', $str);

    return iconv('utf-16be', 'utf-8', strrev($encoding));
}

/**
 * Reverse words
 *
 * @param string $str a string
 *
 * @return string
 */
function reverseWords(string $str)
{
    $srtToArray = explode(' ', $str);

    return implode(' ', array_reverse($srtToArray));
}
