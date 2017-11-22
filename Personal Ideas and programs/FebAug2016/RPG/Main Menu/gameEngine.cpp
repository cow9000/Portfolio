#include <iostream>
#include <stdlib.h>
#include <conio.h>
#include <windows.h>
#include "gameEngine.h"

#define KEY_UP 72
#define KEY_DOWN 80
#define KEY_LEFT 75
#define KEY_RIGHT 77
#define KEY_ENTER 13

std::string tab(){
	std::cout << "	";
}



bool gameEngine::isGameRunning(){
	return running;
}

void gameEngine::startControls(){
	while(this->isGameRunning()){
		c = getch();
	}	
}


int gameEngine::getControls(){
	return c = getch();
}



void gameEngine::startGame(){
	running = true;
	std::cout << "Welcome to the RPG game" << std::endl;
	std::cout << "    >New Game" << std::endl;
	std::cout << "     Load Game" << std::endl;
	std::cout << "     Quit Game" << std::endl;
	
	int selected = 0;
	
	
	int c = 0;
	bool selectLink = true;
	//selectLink is the above menu (New game, Load game, Quit game).
	while(selectLink){
        
		//c is the selection so, 0 = New game, 1 = Load game, and so on.
		c = 0;
		
		//This switch statement is like an if statement
		/*
		*
		*
		*So it would go like this, 
		*if(c==KEY_UP){
		*
		*Change the menu accordingly
		*
		*}
		*/
        switch(c=getControls()) {
        case KEY_UP:
            //This means that it moves the little arrow (>) up one, if it goes past New game, it will go back down to Quit game.
			//just cycles through
			selected -= 1;
			if(selected < 0){
				selected = 2;
			}
			//This is a system command, THIS IS VERY BAD, DO NOT USE IT! Not all systems use system(), so the program will likely crash when you are doing other things.
			system("cls");
			
			//This just cycles throught the menu after you press the up arrow.
			if(selected == 0){
				std::cout << "Welcome to the RPG game" << std::endl;
				std::cout << "    >New Game" << std::endl;
				std::cout << "     Load Game" << std::endl;
				std::cout << "     Quit Game" << std::endl;
			}else if(selected == 1){
				std::cout << "Welcome to the RPG game" << std::endl;
				std::cout << "     New Game" << std::endl;
				std::cout << "    >Load Game" << std::endl;
				std::cout << "     Quit Game" << std::endl;
			}else if(selected == 2){
				std::cout << "Welcome to the RPG game" << std::endl;
				std::cout << "     New Game" << std::endl;
				std::cout << "     Load Game" << std::endl;
				std::cout << "    >Quit Game" << std::endl;
			}
			
			
			//This starts the Select cycle over again.
            break;
			
        case KEY_DOWN:
			selected += 1;
			if(selected > 2){
				selected = 0;
			}
			
			system("cls");
			
			if(selected == 0){
				std::cout << "Welcome to the RPG game" << std::endl;
				std::cout << "    >New Game" << std::endl;
				std::cout << "     Load Game" << std::endl;
				std::cout << "     Quit Game" << std::endl;
			}else if(selected == 1){
				std::cout << "Welcome to the RPG game" << std::endl;
				std::cout << "     New Game" << std::endl;
				std::cout << "    >Load Game" << std::endl;
				std::cout << "     Quit Game" << std::endl;
			}else if(selected == 2){
				std::cout << "Welcome to the RPG game" << std::endl;
				std::cout << "     New Game" << std::endl;
				std::cout << "     Load Game" << std::endl;
				std::cout << "    >Quit Game" << std::endl;
			}
			break;
		case KEY_ENTER:
			selectLink = false;
			break;
        default:
			//std::cout << c << std::endl;
            break;
        }
	}
	
	switch(selected){
		case 0:
			//New game
			gameEngine::newGame();
			system("cls");
			break;
		case 1:
			//Load game
			gameEngine::loadGame();
			system("cls");
			break;
		case 2:
			//Quit game
			
			system("cls");
			break;
	}
	
}


void gameEngine::newGame(){
	std::string name;
	system("cls");
	HANDLE hConsole = GetStdHandle(STD_OUTPUT_HANDLE);
	SetConsoleTextAttribute(hConsole, FOREGROUND_BLUE | FOREGROUND_GREEN | FOREGROUND_INTENSITY);
	std::cout << "Welcome adventurer, what would you like your name to be?" << std::endl;
	
	//LAZY so I created a tab function
	tab();
	SetConsoleTextAttribute(hConsole, FOREGROUND_BLUE | FOREGROUND_GREEN | FOREGROUND_INTENSITY);
	std::cin >> name;
	

}

void gameEngine::loadGame(){

	//LOAD CHARACTER AND SUCH

}
