<?php
use PHPUnit\Framework\TestCase;

class FrequencyOfCharactersTest extends TestCase
{
	public function positiveDataProvider()
	{
		return [
			[
				'Andrii',
				[
					'A' => 1,
					'n' => 1,
					'd' => 1,
					'r' => 1,
					'i' => 2,
				]
			],
			[
				'PHP',
				[
					'P' => 2,
					'H' => 1,
				]
			],
			[
				'Ноутбук',
				[
					'Н' => 1,
					'о' => 1,
					'у' => 2,
					'т' => 1,
					'б' => 1,
					'к' => 1,
				]
			],
		];
	}

	/**
	 * @param $string
	 * @param $expected
	 *
	 * @dataProvider positiveDataProvider
	 */
	public function testPositive($string, $expected)
	{
		$result = frequencyOfCharacters($string);
		$this->assertEquals($expected, $result);
	}
}