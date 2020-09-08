<?php
use PHPUnit\Framework\TestCase;

class DistributionOfCharactersTest extends TestCase
{
	public function positiveDataProvider()
	{
		return [
			[
				'hello',
				[
					'h' => 20,
					'e' => 20,
					'l' => 40,
					'o' => 20,
				]
			],
			[
				'Andrii',
				[
					'A' => 16.67,
					'n' => 16.67,
					'd' => 16.67,
					'r' => 16.67,
					'i' => 33.33,
				]
			],
			[
				'Привіт',
				[
					'П' => 16.67,
					'р' => 16.67,
					'и' => 16.67,
					'в' => 16.67,
					'і' => 16.67,
					'т' => 16.67,
				]
			],
			[
				'ПХП',
				[
					'П' => 66.67,
					'Х' => 33.33,
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
		$result = distributionOfCharacters($string);
		$this->assertEquals($expected, $result);
	}
}