<?php declare(strict_types=1);

namespace JCode;

/**
 * Class DateTime
 * @package JCode
 */
class DateTime extends \Nette\Utils\DateTime
{
	const 
		QUARTER_FIRST_DAY = 2,
		QUARTER_LAST_DAY = 4;

	/**
	 * @param int|null $number
	 * @param int      $fl
	 *
	 * @return \JCode\DateTime
	 * @throws \JCode\DateTimeException
	 */
	public function setQuarter(int $number = null, int $fl = self::QUARTER_FIRST_DAY) : DateTime
	{
		if(!in_array($number, [1, 2, 3, 4, null]))
			throw new DateTimeException('Wrong argument in setQuarter on position one. Input value is: '. $number, 1);

		if(!in_array($fl, [self::QUARTER_FIRST_DAY, self::QUARTER_LAST_DAY]))
			throw new DateTimeException('Wrong argument in setQuarter on position two. Input value is: '. $fl, 2);

		if($number === null)
			$number = ceil(intval($this->format('n')) / 3);

		$map = [
			self::QUARTER_FIRST_DAY => [
				1 => 'January',
				2 => 'April',
				3 => 'July',
				4 => 'October'
			],
			self::QUARTER_LAST_DAY => [
				1 => 'March',
				2 => 'June',
				3 => 'September',
				4 => 'December'
			],
		];

		$this->modify(($fl === self::QUARTER_FIRST_DAY ? 'first' : 'last').' day of '.$map[$fl][$number]);

		return $this;
	}

	/**
	 * @return string
	 */
	public function formatQuarter() : string
	{
		return $this->format('Y').'Q'.ceil(intval($this->format('n')) / 3);
	}

}
