#ifndef PLAYER_H
#define PLAYER_H



class Player
{
	public:
		Player();
		int doDamage();
		void getDamage(int damageDone);
		bool isDead();
		void chargeD();
	private:
		int maxHealth;
		int health;
		int damage;
		int charge;
};

#endif //PLAYER_H