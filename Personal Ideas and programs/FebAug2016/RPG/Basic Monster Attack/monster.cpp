#include <iostream>
#include<conio.h>
#include<time.h>
#include <random>
#include "monster.h"

Monster::Monster(){

	maxHealth = 100;
	health = 100;
	isdead = false;
	srand(time(NULL)); 
	damage = rand()%100 + 1;
}

void Monster::hurt(int h)
{

	health -= h;
	
	std::cout  << "TO MONSTER - " << h << " damage done." << std::endl;
	
	if(health <= 0){
		Death();
	}
	
}

int Monster::doDamage(){
	srand(time(NULL));
	int totalDamage = rand()%4 + 1;
	totalDamage += damage;
	return totalDamage;

}

void Monster::Death(){

	std::cout << "Monster is dead." << std::endl;
	isdead = true;
}

bool Monster::isDead(){
	
	return isdead;

};