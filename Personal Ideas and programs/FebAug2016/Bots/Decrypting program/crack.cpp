#include <iostream>
#include <fstream>
#include <string>
#include <cstring>
#include <cstddef>
#include "crack.h"

int convert( size_t what )
{
    return static_cast<int>( what );
}

void crack::start()
{
	std::cout << "GETTING TEXT FROM 'code.txt' - PRESS ENTER TO CONTINUE" << std::endl; 
	std::ifstream file_("adobe.dump");
	if(file_.is_open()){
		while(getline(file_,text)){
			
		}
		file_.close();
	}else{
		std::cout << "File does not exist, please place code into a file called code.txt. If it does not exist, create a code.txt" << std::cout;
	}
	std::cout << text << std::endl;
	std::cout << "\n" << strlen(text.c_str());

	
	std::cin.get();
	
	std::cout << "TURNING HEX INTO ARRAY" << std::endl;
	
	std::strncpy(textToDecode, text.c_str(), sizeof(textToDecode));
	textToDecode[sizeof(textToDecode) - 1] = 0;
	
	std::strncpy(textToDecode3, text.c_str(), sizeof(textToDecode3));
	textToDecode3[sizeof(textToDecode3) - 1] = 0;
	
	std::strncpy(textToDecode5, text.c_str(), sizeof(textToDecode5));
	textToDecode5[sizeof(textToDecode5) - 1] = 0;
	
	std::strncpy(textToDecode7, text.c_str(), sizeof(textToDecode7));
	textToDecode7[sizeof(textToDecode7) - 1] = 0;
	letterDecrypt();
}

void crack::letterDecrypt()
{
	bool change = true;
	for(int shift = 1; shift < 26; shift++){
		
		for(int i = 0; i < sizeof(textToDecode); i++)
		{
			for(int i2 = 0; i2 < 26; i2++){
			
			
				if(textToDecode[i] == alphabet[i2]){
					if(change){
						if(i2 + shift > 25){
							textToDecode3[i] = alphabet[shift - i2];
							
						}else{
							textToDecode3[i] = alphabet[i2 + shift];
						}
						change = false;
					}
				}else if(textToDecode[i] == alphabet2[i2]){
						if(i2 + shift > 25){
							textToDecode3[i] = alphabet2[shift - i2];
							
						}else{
							textToDecode3[i] = alphabet2[i2 + shift];
						}
						change = false;
				}
			}
			change = true;
			
		}
		for(int rev = 0; rev < sizeof(textToDecode3); rev++){
			editedText = editedText + textToDecode3[rev];
			std::cout << textToDecode3[rev];
		}
		std::cout << editedText << std::endl;
		hexToASCII();
		editedText = "";
	}
	numberDecrypt();
	
	
}

void crack::numberDecrypt()
{
	
	bool change = true;
	for(int shift = 1; shift < 10; shift++){
		
		for(int i = 0; i < sizeof(textToDecode); i++)
		{
			for(int i2 = 0; i2 < 10; i2++){
			
			
				if(textToDecode[i] == numbers[i2]){
					if(change){
						if(i2 + shift > 9){
							textToDecode5[i] = numbers[shift - i2];
							
						}else{
							textToDecode5[i] = numbers[i2 + shift];
						}
						change = false;
					}
				}
			}
			change = true;
			
		}
		for(int rev = 0; rev < sizeof(textToDecode); rev++){
			editedText = editedText + textToDecode5[rev];
			std::cout << textToDecode5[rev];
		}
		std::cout << editedText << std::endl;
		hexToASCII();
		editedText = "";
	}
	bothDecrypt();
	
}



void crack::hexToASCII()
{
	textFileNumber += 1;
	int len = editedText.length();
	
	
	std::ofstream outfile2 ("ASCII/" + std::to_string(textFileNumber) + "HEXTEXT.txt");
	outfile2 << editedText << std::endl;
	outfile2.close();
	
	
	
	std::string newString;
	
	
	
	
	
	for(int i=0; i< len; i+=2)
	{
		std::string byte = editedText.substr(i,2);
		char chr = (char) (int)strtol(byte.c_str(), NULL, 16);
		newString.push_back(chr);
	}
	std::cout << newString << std::endl;
	
	std::ofstream outfile ("ASCII/" + std::to_string(textFileNumber) + "TEXT.txt");
	outfile << newString << std::endl;
	outfile.close();
	
}

void crack::bothDecrypt()
{
	bool change = true;
	bool change2 = true;
	for(int shift = 1; shift < 26; shift++){
		
		for(int i = 0; i < sizeof(textToDecode); i++)
		{
			for(int i2 = 0; i2 < 26; i2++){
			
			
				if(textToDecode[i] == alphabet[i2]){
					if(change){
						if(i2 + shift > 25){
							textToDecode7[i] = alphabet[shift - i2];							
						}else{
							textToDecode7[i] = alphabet[i2 + shift];
						}
						
							for(int shift = 1; shift < 10; shift++){
								
								for(int i = 0; i < sizeof(textToDecode); i++)
								{
									for(int i2 = 0; i2 < 10; i2++){
									
									
										if(textToDecode[i] == numbers[i2]){
											if(change2){
												if(i2 + shift > 9){
													textToDecode7[i] = numbers[shift - i2];
													
												}else{
													textToDecode7[i] = numbers[i2 + shift];
												}
												change2 = false;
											}
										}
									}
									change2 = true;
									
								}
								for(int rev = 0; rev < sizeof(textToDecode); rev++){
									editedText = editedText + textToDecode7[rev];
									std::cout << textToDecode7[rev];
								}
								std::cout << editedText << std::endl;
								hexToASCII();
								editedText = "";
								
							}
						
						change = false;
					}
				}else if(textToDecode[i] == alphabet2[i2]){
						if(i2 + shift > 25){
							textToDecode7[i] = alphabet2[shift - i2];
							
						}else{
							textToDecode7[i] = alphabet2[i2 + shift];
						}
							for(int shift = 1; shift < 10; shift++){
								
								for(int i = 0; i < sizeof(textToDecode); i++)
								{
									for(int i2 = 0; i2 < 10; i2++){
									
									
										if(textToDecode[i] == numbers[i2]){
											if(change2){
												if(i2 + shift > 9){
													textToDecode7[i] = numbers[shift - i2];
													
												}else{
													textToDecode7[i] = numbers[i2 + shift];
												}
												change2 = false;
											}
										}
									}
									change2 = true;
									
								}
								for(int rev = 0; rev < sizeof(textToDecode); rev++){
									editedText = editedText + textToDecode7[rev];
									std::cout << textToDecode7[rev];
								}
								std::cout << editedText << std::endl;
								hexToASCII();
								editedText = "";
							}
						change = false;
				}
			}
			change = true;
			change2 = true;
		}
		hexToASCII();
		
	}
	
	
}
