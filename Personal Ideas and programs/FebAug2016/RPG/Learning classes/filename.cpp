#include <iostream>
#include "filename.h"

filename::filename()
{
	string = "Monster name";
}

void filename::printout()
{
	std::cout << string << std::endl;
}