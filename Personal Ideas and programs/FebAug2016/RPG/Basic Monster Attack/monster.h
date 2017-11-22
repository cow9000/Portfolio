#ifndef MONSTER_H
#define MONSTER_H

#include <iostream>


class Monster
{

	public:
		Monster();
		void hurt(int h);
		void Death();
		bool isDead();
		int doDamage();
	private:
		int maxHealth;
		int health;
		int damage;
		int defense;
		bool isdead;
};

#endif //MONSTER_H