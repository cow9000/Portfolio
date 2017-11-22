#include <fstream>
#include <iostream>
#include <direct.h>
#include <ctime>
#include <string>
#include <sstream>
#include "date.h"


namespace function{
    std::string to_string(int i){

        std::ostringstream convert;   // stream used for the conversion

        convert << i;      // insert the textual representation of 'Number' in the characters in the stream

        return convert.str();

    }
}

std::string date::getDate(){

    //This returns the time and date
    time_t now = time(0);
    
    //Variable to send all data to
    std::string currentDate;
    
    std::tm *ltm = localtime(&now);
    

    //For month
    if(ltm->tm_mon + 1 < 10){
    
    
        currentDate += "0" + function::to_string((ltm->tm_mon + 1));
    }else currentDate += function::to_string((ltm->tm_mon + 1));
    if(ltm->tm_mday < 10){
        currentDate += "0" + function::to_string((ltm->tm_mday));
    }else currentDate += function::to_string((ltm->tm_mday));
    currentDate += function::to_string((1900 + ltm->tm_year));
    return currentDate;
}


void date::createDateFile(){
    std::string currentDate = getDate();
    
    
    std::ofstream date;
    if(!std::ifstream(("TextFiles/" + currentDate + ".txt").c_str())){
        date.open(("TextFiles/" + currentDate + ".txt").c_str());
        date << "#This was created on " + currentDate;
        date.close();
    }
}

void date::createGlobalFile(){
    //global.txt will contain the text file from the date. Example - 
    //
    //global.txt
    /////////////////////////////////////////////////////////////////
    //#This file is for things that exist beyond 1 period (IE 2 days).
    //09072016.txt
    /////////////////////////////////////////////////////////////////
    //
    //It will then output the text in that file.
    std::ofstream file;
    if(!std::ifstream("TextFiles/global.txt")){
        file.open("TextFiles/global.txt");
        std::cout << "Global.txt does not exist, creating..." << std::endl;
        file << "#This file is for things that exist beyond 1 period (IE 2 days).";
        file.close();
    }
}


void date::start(){
    mkdir("TextFiles");
    createGlobalFile();
    createDateFile();
    while(running){
        //SHOW REMINDERS HERE
        std::cout << "What would you like to do?" << std::endl;
        std::cout << "[C] - Create a new reminder" << std::endl;
        std::cout << "[D] - Delete a reminder" << std::endl;
        std::cout << "[E] - Edit a reminder" << std::endl;
        std::cin >> choice;
        switch(choice){
            case 'C':
                create();
                break;
            case 'D':
                del();
                break;
            case 'E':
                edit();
                break;
            default:
                std::cout << "INVALID INPUT" << std::endl;
                break;
        }
    }

}

void date::edit(){
    std::string fileName;
    
    
    
    std::cout << "" << std::endl;
    std::cin >> fileName;
    std::cout << "-------------------- STARTING TRANSMISSION --------------------" << std::endl;
    std::string str;
    
    std::ifstream file;
    if(std::ifstream(("TextFiles/" + fileName).c_str())){
        file.open("TextFiles/" + fileName);
        while(std::getline(file, str)){
            std::cout << str << std::endl;
        }
    }
     std::cout << "-------------------- END TRANSMISSION --------------------" << std::endl;
}

void date::del(){
    std::cout << "hey";
}

void date::create(){
    std::cout << "hey";
}