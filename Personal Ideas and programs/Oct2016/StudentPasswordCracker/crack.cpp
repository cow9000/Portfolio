#include <string>
#include <iostream>
#include <sstream>

#include "crack.h"
#include "load.h"

crack::crack(load &c) {

    this->a = &c;
    
    this->data = a->returnData();
    std::cout << "Press [ENTER] to continue" << std::endl;
    std::cin.get();
    startCrack();
    

}

void crack::startCrack(){
    wordnumber = 0;
    counter = 0;
    std::cout << "The length of the string is - " << data.length() << std::endl;
    std::cin.get();
    std::string arr[data.length()];
    for(int i = 0; i < data.length(); i++){
        
        if(data[i] == ' '){
            if(counter > a->returnSize()-1){
                std::cout << "Word stored in array." << std::endl;
                
                arr[wordnumber] = word;
                
                wordnumber += 1;
            }
            counter = 0;
            word = "";
        }else{
            counter += 1;
            word += data[i];
        }
    }
    
    std::cout << "The total number of words counted are - " << wordnumber + 1 << std::endl;
    cracking=true;
    while(cracking){
        if(currentCrack == 0){
            for(int c = 0; c < arr.size(); c++){
                for(int i = 0; i < 10; i++){
                    std::stringstream out;
                    out << i;
                    std::string s = out.str();
                    numberAddon = i;
                    password = arr[currentCrack] + arr[c] +  s;
                    std::cout << password << std::endl;
                }
            }
        }else{
            for(int c = 0; c < arr.size(); c++){
                for(int i = 0; i < 10; i++){
                    std::stringstream out;
                    out << i;
                    std::string s = out.str();
                    numberAddon = i;
                    password = arr[currentCrack] + arr[c] + s;
                    std::cout << password << std::endl;
                }
            }
        }
        currentCrack += 1;
        //if(currentCrack >= arr.size) break;
    }
    

}