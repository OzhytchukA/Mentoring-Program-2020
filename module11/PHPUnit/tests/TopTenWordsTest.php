<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

const ENG_TEXT = 'At consectetur lorem donec massa. Tortor posuere ut consequat semper viverra nam. Sit amet commodo nulla facilisi nullam vehicula. How pharetra pharetra massa massa ultricies quis. Suscipit adipiscing bibendum est ultricies integer quis auctor elit. Curabitur gravida arcu ac tortor dignissim convallis. Sem integer vitae justo eget. Sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium. Massa eget egestas purus viverra accumsan in. Non quam lacus suspendisse faucibus. Varius vel pharetra vel turpis. Sit amet justo donec enim diam vulputate. Diam sollicitudin tempor id nisl nunc mi. Nunc sed augue lacus viverra vitae congue eu. Turpis egestas sed tempus urna pharetra pharetra. Ornare arcu dui vivamus arcu. Cursus vitae congue mauris rhoncus aenean vel. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Adipiscing diam donec adipiscing tristique risus nec. Lacus laoreet non curabitur gravida arcu tortor.';
const UKR_TEXT = 'Речення роблять із світу буття, яке є щастям. Життя речень виконує бутті таку саму функцію, як обмін речовин, метаболізм існуванні органічної матерії. Для якісного буття необхідний налагоджений реченнєвий обмін. Маючи доступ до атомів-слів, можемо поглинати світ вигляді сполук-речень. Їх можемо розщеплювати, перетворюючи ріст. І ми їх мусимо синтезувати самі. Справа вагомості думки, мальовничості образів. Буття присутнє тільки синтезованих, сформульованих реченнях. Тобто самому процесі синтезу. Речення можуть бути різні – короткі, довгі, дуже довгі, простіші, складніші, точніші, прозоріші, блискучіші, лапідарні, відшліфовані, промовлені, записані, непромовлені. Щастя буття залежить тільки від інтенсивності синтезу. Тобто не від кількості, а від неперервності процесу структурування мови, в якій проживаємо життя';

class CountNumsTest extends TestCase
{
	public function positiveDataProvider()
	{
		return [
			[
				ENG_TEXT,
				false,
				[
					'sollicitudin',
					'pellentesque',
					'suspendisse',
					'scelerisque',
					'consectetur',
					'adipiscing',
					'adipiscing',
					'Adipiscing',
					'vulputate',
					'ultricies',
				]
			],
			[
				ENG_TEXT,
				true,
				[
					'At',
					'ac',
					'eu',
					'id',
					'in',
					'mi',
					'ut',
					'How',
					'Non',
					'Sed',
				]
			],
			[
				UKR_TEXT,
				false,
				[
					'сформульованих',
					'структурування',
					'інтенсивності',
					'неперервності',
					'мальовничості',
					'сполукречень',
					'синтезованих',
					'розщеплювати',
					'перетворюючи',
					'непромовлені',
				]
			],
			[
				UKR_TEXT,
				true,
				[
					'І',
					'а',
					'в',
					'х',
					'х',
					'до',
					'ми',
					'не',
					'як',
					'із',
				]
			],
		];
	}

	/**
	 * @param string $string
	 * @param boolean $sortAsc
	 * @param $expected
	 *
	 * @dataProvider positiveDataProvider
	 */
	public function testPositive( string $string, bool $sortAsc, $expected )
	{
		$result = topTenWords($string, $sortAsc);
		$this->assertEquals($expected, $result);
	}
}