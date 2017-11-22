#include <string>
#include <fstream>
#include <iostream>

#include "load.h"

load::load() {
    
    this->directory = "text/";
    this->IntroFile = "intro.txt";
    if(loadFile(IntroFile)){
        std::ifstream OutputFile((this->directory + "intro.txt").c_str());
        std::cout << printFile(OutputFile, "n");
        std::cout << "\n";
        std::cin >> this->fileName;
        std::cout << "\nPlease enter the length of the words" << std::endl;
        std::cin >> this->size;
        loadFile();
    }else{
        std::cout << "intro.txt does not exist. Someone may have deleted it, sorry." << std::endl;
        std::cout << "Please enter the dictionary path. (Example: 4letterpasswords.txt)";
        std::cin >> this->fileName;
        std::cout << "\nPlease enter the length of the words" << std::endl;
        std::cin >> this->size;
    }
    
    
    
}

bool load::loadFile(std::string &name){

    std::ifstream f((this->directory + name).c_str());
    if(f.is_open()){
        f.close();
        return true;
    }
    return false;
    
}

void load::loadFile(){

    this->file.open((directory + fileName).c_str());
    this->data = printFile(file, "y");
    std::cin.get();
}

std::string load::printFile(std::ifstream &output, std::string ifdata){
    
    std::string getContent;
    std::string content = "";
    if(output.is_open()){
        while(!output.eof()){
            getline(output,getContent);
            if(ifdata != "y"){
                content += "\n" + getContent;
            }else{
                content += getContent;
            }
        }
    }
    return content;

}


std::string load::returnData(){
    if(file.is_open()){
        return data;
    }
    return "";
}

int load::returnSize(){
    return size;
}

