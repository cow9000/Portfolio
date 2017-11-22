#ifndef CRACK_H
#define CRACK_H

#include <string>


#include "load.h"

class crack{

    public:
        crack(load &c);
        void startCrack();
    private:
        std::string data;
        load* a;
        std::string array[];
        int counter;
        int wordnumber;
        std::string word;
        
        //start cracking
        bool cracking;
        
        //for cracking the passwords
        int currentCrack = 0;
        std::string password;
        int numberAddon;
};

#endif //CRACK_H