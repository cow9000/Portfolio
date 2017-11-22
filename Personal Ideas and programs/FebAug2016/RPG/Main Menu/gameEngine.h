#ifndef GAMEENGINE_H
#define GAMEENGINE_H

#include <iostream>



class gameEngine
{
	public:
		void startGame();
		void newGame();
		void loadGame();
		void startControls();
		int getControls();
		bool isGameRunning();
	private:
		bool running;
		int c;
};

#endif // GAMEENGINE_H