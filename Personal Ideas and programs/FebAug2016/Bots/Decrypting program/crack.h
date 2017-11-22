#ifndef CRACK_H
#define CRACK_H

#include <string>

class crack
{
	public:
		//This is required for the project to start. Will need to get text to decode, and put that text into an array. Then call the letterDecrypt function.
		void start();
		
		//START THE CIPHER DECRYPTION, shift letters 0 through 25. After each shift do hexToASCII(); then after this function is done call numberDecrypt();
		//When shifting it will get what letter it is, if it is A, it will be change = 0 + shift.
		//if change is > 26, do change - 26;
		void letterDecrypt();
		
		//START THE CIPHER DECRYPTION FOR NUMBERS, shift numbers 1 through 26. After each shift do hexToASCII(); then after this function is done call bothDecrypt();
		void numberDecrypt();
		
		//START THE CIPHER DECRYPTION FOR LETTERS AND NUMBERS, shift 
		void bothDecrypt();
		
		//This is when it is done using the ciphers so it can translate the hex to ASCII and dump to a file.
		void hexToASCII();
		
		//convert TextToDecode[]'s chars into editedText;
		void arrayToEditedText();
		
		
	private:
		/*
		*
		*
		*MAIN VARIABLES, NEEDED TO FUNCTION
		*
		*
		*/
		//Just so you don't get lost, methods will be used for booleans.
		//It is so the progam knows what methods have already been tried (0 for false or 1 for true). 
		int methods [100];
		
		//The reason why I have the arrays is because when I am using the Caesar Cipher it can easily go to one or two before
		//This is so the software can run through all the letters and pick out letters from them
		char alphabet[26] = {'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'};
		char alphabet2[26] = {'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'};
		//This is so it can run through the numbers
		char numbers[10] = {'0','1','2','3','4','5','6','7','8','9'};
		
		//This is so that when it dumps the decoded hex into a file, it doesn't decode anything.
		int textFileNumber = 0;
		
		/*
		*
		*
		*VARIABLES THAT CONTAIN THE TEXT TO BE DECODED
		*
		*/
		
		
		std::string text;
		
		//THIS WILL END UP BEING AN ARRAY SO THAT WE CAN EASILY CYCLE THROUGH THE TEXT
		char textToDecode[2048];
		char textToDecode3[2048];
		char textToDecode5[2048];
		char textToDecode7[2048];
		std::string editedText;
		
		
		
		/*
		*
		*CEASAR CIPHER VARIABLES
		*
		*///////////////////////////////////////////////////////
		
		//THE CONTAINEDLETTERS ARRAY WILL BE WHAT THE SOFTWARE USES TO LOOK THROUGH ALL THE LETTERS IN THE FILE/TEXT
		const char* containedLetters[6] = {"a","b","c","d","e","f"};
		const int shiftLimit = sizeof(alphabet);
		//0 = 0 shifted (DEFAULT Apple = apple), 1 = 1 shifted (Apple = Bqqmf)
		int currentShift = 0;
		///////////////////////////////////////////////////////
		
		
};




#endif