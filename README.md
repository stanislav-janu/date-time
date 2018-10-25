DateTime
========

Extension for class Nette\Utils\DateTime.

[![Build Status](https://travis-ci.org/stanislav-janu/date-time.svg?branch=master)](https://travis-ci.org/stanislav-janu/date-time)
[![Latest Stable Version](https://poser.pugx.org/stanislav-janu/date-time/v/stable)](https://packagist.org/packages/stanislav-janu/date-time)
[![Total Downloads](https://poser.pugx.org/stanislav-janu/date-time/downloads)](https://packagist.org/packages/stanislav-janu/date-time)
[![Latest Unstable Version](https://poser.pugx.org/stanislav-janu/date-time/v/unstable)](https://packagist.org/packages/stanislav-janu/date-time)
[![License](https://poser.pugx.org/stanislav-janu/date-time/license)](https://packagist.org/packages/stanislav-janu/date-time)

Methods:
--------
- `setQuarter([int $number [, int $fl]])`
	- $number range `1` – `4` or `null` (default: `null`)
	- $fl = `DateTime::QUARTER_FIRST_DAY` or `DateTime::QUARTER_LAST_DAY` (default: `DateTime::QUARTER_FIRST_DAY`)
- `formatQuarter()` returned string "2018Q4"