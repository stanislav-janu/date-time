<?php declare(strict_types=1);

namespace JanuSoftware\Tests\DateTime;

use JanuSoftware\DateTime;
use JanuSoftware\DateTimeException;
use PHPUnit\Framework\TestCase;

class DateTimeTest extends TestCase
{

	public function testMain()
	{
		$date = new DateTime('1991-06-17');

		$this->assertSame($date->setQuarter(1)->format('Y-m-d'), '1991-01-01');
		$this->assertSame($date->setQuarter(1, DateTime::QuarterLastDay)->format('Y-m-d'), '1991-03-31');

		$this->assertSame($date->setQuarter(2)->format('Y-m-d'), '1991-04-01');
		$this->assertSame($date->setQuarter(2, DateTime::QuarterLastDay)->format('Y-m-d'), '1991-06-30');

		$this->assertSame($date->setQuarter(3)->format('Y-m-d'), '1991-07-01');
		$this->assertSame($date->setQuarter(3, DateTime::QuarterLastDay)->format('Y-m-d'), '1991-09-30');

		$this->assertSame($date->setQuarter(4)->format('Y-m-d'), '1991-10-01');
		$this->assertSame($date->setQuarter(4, DateTime::QuarterLastDay)->format('Y-m-d'), '1991-12-31');

		$date = new DateTime(new \DateTime('1991-06-17'));

		$this->assertSame($date->setQuarter(1)->format('Y-m-d'), '1991-01-01');
		$this->assertSame($date->setQuarter(1, DateTime::QuarterLastDay)->format('Y-m-d'), '1991-03-31');

		$this->assertSame($date->setQuarter(2)->format('Y-m-d'), '1991-04-01');
		$this->assertSame($date->setQuarter(2, DateTime::QuarterLastDay)->format('Y-m-d'), '1991-06-30');

		$this->assertSame($date->setQuarter(3)->format('Y-m-d'), '1991-07-01');
		$this->assertSame($date->setQuarter(3, DateTime::QuarterLastDay)->format('Y-m-d'), '1991-09-30');

		$this->assertSame($date->setQuarter(4)->format('Y-m-d'), '1991-10-01');
		$this->assertSame($date->setQuarter(4, DateTime::QuarterLastDay)->format('Y-m-d'), '1991-12-31');

		$date = new DateTime(new \Nette\Utils\DateTime('1991-06-17'));

		$this->assertSame($date->setQuarter(1)->format('Y-m-d'), '1991-01-01');
		$this->assertSame($date->setQuarter(1, DateTime::QuarterLastDay)->format('Y-m-d'), '1991-03-31');

		$this->assertSame($date->setQuarter(2)->format('Y-m-d'), '1991-04-01');
		$this->assertSame($date->setQuarter(2, DateTime::QuarterLastDay)->format('Y-m-d'), '1991-06-30');

		$this->assertSame($date->setQuarter(3)->format('Y-m-d'), '1991-07-01');
		$this->assertSame($date->setQuarter(3, DateTime::QuarterLastDay)->format('Y-m-d'), '1991-09-30');

		$this->assertSame($date->setQuarter(4)->format('Y-m-d'), '1991-10-01');
		$this->assertSame($date->setQuarter(4, DateTime::QuarterLastDay)->format('Y-m-d'), '1991-12-31');


		$this->assertSame((new DateTime(null))->format(DateTime::RFC3339_EXTENDED), (new DateTime('now'))->format(DateTime::RFC3339_EXTENDED));

	}

	public function testException1()
	{
		$this->expectException(DateTimeException::class);
		$this->expectExceptionCode(1);
		(new DateTime('1991-06-17'))->setQuarter(5);
	}

	public function testException2()
	{
		$this->expectException(DateTimeException::class);
		$this->expectExceptionCode(2);
		(new DateTime('1991-06-17'))->setQuarter(1, 0);
	}

}
