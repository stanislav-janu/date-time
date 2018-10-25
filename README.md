DateTime
========

Extension for class Nette\Utils\DateTime.

Methods:
--------
- `setQuarter([int $number [, int $fl]])`
	- $number range `1` – `4` or `null` (default: `null`)
	- $fl = `DateTime::QUARTER_FIRST_DAY` or `DateTime::QUARTER_LAST_DAY` (default: `DateTime::QUARTER_FIRST_DAY`)
- `formatQuarter()` returned string "2018Q4"