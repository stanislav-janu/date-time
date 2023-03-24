<?php

declare(strict_types=1);

namespace JanuSoftware;

use DateTimeZone;


class DateTime extends \Nette\Utils\DateTime
{
	public const
		QuarterFirstDay = 2,
		QuarterLastDay = 4;


	public function __construct($time = 'now', DateTimeZone $timezone = null)
	{
		if ($time instanceof \DateTimeInterface) {
			$timezone = $time->getTimezone();
			$time = $time->format(\DateTime::RFC3339_EXTENDED);
		} elseif (is_numeric($time)) {
			if ($time <= self::YEAR) {
				$time += time();
			}

			$time = '@' . $time;
			$timezone = new DateTimeZone(date_default_timezone_get());
		} elseif ($time === null) {
			$time = 'now';
		}

		parent::__construct($time, $timezone);
	}


	/**
	 * @param int|null $number
	 * @param int      $fl
	 *
	 * @return DateTime
	 * @throws DateTimeException
	 */
	public function setQuarter(int $number = null, int $fl = self::QuarterFirstDay): self
	{
		if (!in_array($number, [1, 2, 3, 4, null], true)) {
			throw new DateTimeException('Wrong argument in setQuarter on position one. Input value is: ' . $number, 1);
		}

		if (!in_array($fl, [self::QuarterFirstDay, self::QuarterLastDay], true)) {
			throw new DateTimeException('Wrong argument in setQuarter on position two. Input value is: ' . $fl, 2);
		}

		if ($number === null) {
			$number = ceil((int) ($this->format('n')) / 3);
		}

		$map = [
			self::QuarterFirstDay => [
				1 => 'January',
				2 => 'April',
				3 => 'July',
				4 => 'October',
			],
			self::QuarterLastDay => [
				1 => 'March',
				2 => 'June',
				3 => 'September',
				4 => 'December',
			],
		];

		$this->modify(($fl === self::QuarterFirstDay ? 'first' : 'last') . ' day of ' . $map[$fl][$number]);

		return $this;
	}


	public function formatQuarter(): string
	{
		return $this->format('Y') . 'Q' . ceil((int) ($this->format('n')) / 3);
	}
}
