#include <iostream>
#include <string>
#include<conio.h>
#include<time.h>
#include <random>
#include<stdlib.h>
#include <cmath>
#include "player.h"

Player::Player(){
	maxHealth = 100;
	health = 100;
	damage = 3;
	charge = 0;

}

int Player::doDamage(){
	//This makes a random number
	srand(time(NULL));
	int totalDamage = rand()%4 + 1;
	totalDamage += damage;
	if(charge != 0){
		totalDamage = pow(totalDamage, charge);
		charge = 0;
	}
	return totalDamage;
}

void Player::getDamage(int damageDone){

	health -= damageDone;
	std::cout  << "TO PLAYER - " << damageDone << " damage done." << std::endl;
	std::cout << "Player health - " << health << std::endl;
}
void Player::chargeD(){

	charge += 2;

}

bool Player::isDead(){

	if(health <= 0){
		return true;
	}else{
		return false;
	}

}