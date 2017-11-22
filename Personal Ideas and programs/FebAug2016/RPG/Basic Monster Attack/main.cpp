#include <iostream>
#include "monster.h"
#include "player.h"

/*
*
*
*RUSHED CODE AHEAD!!!!!
*
*
*/



int main(){
	
	Monster m;
	Player p;
	std::string choice;
	std::cout << "Welcome to the worlds worst RPG!\n\n" << std::endl;
	
	while(!m.isDead()){
		//Break out of loop if player is dead
		if(p.isDead()){
		std::cout << "\n\nYOU DIED!!!!!!!!!!\n\n" << std::endl;
			break;
		}
		std::cout << "What would you like to do?" << std::endl;
		std::cout << "(A)ttack or (C)harge your attack (^2 per charge)" << std::endl;
		std::cin >> choice;
		
		if(choice == "A" || choice == "a"){
		
		m.hurt(p.doDamage());
		
		
		
		if(!m.isDead()){
		p.getDamage(m.doDamage());
		}
		
		}else{
			//CHARGE
			p.chargeD();
			if(!m.isDead()){
			p.getDamage(m.doDamage());
			}
		}
	
	}
	
	if(m.isDead()){
	std::cout << "YOU KILLED THE MONSTER!" << std::endl;
	}
	std::cin >> choice;
	return 0;

}