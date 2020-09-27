SINGLE CHARACTERS
	[abc] = a or b or c
	. = any single character

POSITION
	^abc = a **position before first character
	abc$ = c **position after last character
	a|b = a OR B ***everything right or everything left

OPTIONAL***
	The question mark makes the preceding token in the regular expression optional.
	Nov(ember)? = BOTH Nov AND November
	Colou?r = BOTH Colour AND color

REPETATION
	* match the preceding token zero or more TIMES
	+ match the preceding token once or more TIMES
	{min,max}