<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

const ENG_TEXT = 'At consectetur lorem donec massa. Tortor posuere ac ut consequat semper viverra nam. Sit amet commodo nulla facilisi nullam vehicula. Et pharetra pharetra massa massa ultricies mi quis. Suscipit adipiscing bibendum est ultricies integer quis auctor elit. Curabitur gravida arcu ac tortor dignissim convallis. Eu sem integer vitae justo eget. Sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium. Massa eget egestas purus viverra accumsan in. Non quam lacus suspendisse faucibus. At varius vel pharetra vel turpis. Sit amet justo donec enim diam vulputate. Diam sollicitudin tempor id eu nisl nunc mi. Nunc sed augue lacus viverra vitae congue eu. Ac turpis egestas sed tempus urna et pharetra pharetra. Ornare arcu dui vivamus arcu. Cursus vitae congue mauris rhoncus aenean vel. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Adipiscing diam donec adipiscing tristique risus nec. Lacus laoreet non curabitur gravida arcu ac tortor.';
const UKR_TEXT = 'Речення роблять із світу буття, яке і є щастям. Життя речень виконує у бутті таку саму функцію, як обмін речовин, метаболізм у існуванні органічної матерії. Для якісного буття необхідний налагоджений реченнєвий обмін. Маючи доступ до атомів-слів, ми можемо поглинати світ у вигляді сполук-речень. Ми ж їх можемо розщеплювати, перетворюючи у ріст. І ми їх мусимо синтезувати самі. Справа не у вагомості думки, не у мальовничості образів. Буття присутнє тільки у синтезованих, сформульованих реченнях. Тобто у самому процесі синтезу. Речення можуть бути різні – короткі, довгі, дуже довгі, простіші, складніші, точніші, прозоріші, блискучіші, лапідарні, відшліфовані, промовлені, записані, непромовлені. Щастя буття залежить тільки від інтенсивності синтезу. Тобто не від кількості, а від неперервності процесу структурування мови, в якій проживаємо життя';

class TopTenSentencesTest extends TestCase
{
	public function positiveDataProvider()
	{
		return [
			[
				ENG_TEXT,
				true,
				[
					'At consectetur lorem donec massa',
					'Ornare arcu dui vivamus arcu',
					'Non quam lacus suspendisse faucibus',
					'Eu sem integer vitae justo eget',
					'At varius vel pharetra vel turpis',
					'Curabitur gravida arcu ac tortor dignissim convallis',
					'Massa eget egestas purus viverra accumsan in',
					'Sit amet justo donec enim diam vulputate',
					'Sit amet commodo nulla facilisi nullam vehicula',
					'Cursus vitae congue mauris rhoncus aenean vel',
				]
			],
			[
				ENG_TEXT,
				false,
				[
					'Sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium',
					'Auctor neque vitae tempus quam pellentesque nec nam aliquam sem',
					'Suscipit adipiscing bibendum est ultricies integer quis auctor elit',
					'Ac turpis egestas sed tempus urna et pharetra pharetra',
					'Lacus laoreet non curabitur gravida arcu ac tortor',
					'Et pharetra pharetra massa massa ultricies mi quis',
					'Tortor posuere ac ut consequat semper viverra nam',
					'Diam sollicitudin tempor id eu nisl nunc mi',
					'Nunc sed augue lacus viverra vitae congue eu',
					'Cursus vitae congue mauris rhoncus aenean vel',
				]
			],
			[
				UKR_TEXT,
				true,
				[
					'Тобто у самому процесі синтезу',
					'І ми їх мусимо синтезувати самі',
					'Для якісного буття необхідний налагоджений реченнєвий обмін',
					'Буття присутнє тільки у синтезованих, сформульованих реченнях',
					'Щастя буття залежить тільки від інтенсивності синтезу',
					'Ми ж їх можемо розщеплювати, перетворюючи у ріст',
					'Речення роблять із світу буття, яке і є щастям',
					'Справа не у вагомості думки, не у мальовничості образів',
					'Маючи доступ до атомів-слів, ми можемо поглинати світ у вигляді сполук-речень',
					'Тобто не від кількості, а від неперервності процесу структурування мови, в якій проживаємо життя',
				]
			],
			[
				UKR_TEXT,
				false,
				[
					'Речення можуть бути різні – короткі, довгі, дуже довгі, простіші, складніші, точніші, прозоріші, блискучіші, лапідарні, відшліфовані, промовлені, записані, непромовлені',
					'Життя речень виконує у бутті таку саму функцію, як обмін речовин, метаболізм у існуванні органічної матерії',
					'Тобто не від кількості, а від неперервності процесу структурування мови, в якій проживаємо життя',
					'Маючи доступ до атомів-слів, ми можемо поглинати світ у вигляді сполук-речень',
					'Речення роблять із світу буття, яке і є щастям',
					'Справа не у вагомості думки, не у мальовничості образів',
					'Ми ж їх можемо розщеплювати, перетворюючи у ріст',
					'Для якісного буття необхідний налагоджений реченнєвий обмін',
					'Буття присутнє тільки у синтезованих, сформульованих реченнях',
					'Щастя буття залежить тільки від інтенсивності синтезу',
				]
			],
		];
	}

	/**
	 * @param $string
	 * @param $sortAsc
	 * @param $expected
	 *
	 * @dataProvider positiveDataProvider
	 */
	public function testPositive($string, $sortAsc, $expected)
	{
		$result = topTenSentences($string, $sortAsc);
		$this->assertEquals($expected, $result);
	}
}