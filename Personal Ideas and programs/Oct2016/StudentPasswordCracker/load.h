#ifndef LOAD_H
#define LOAD_H

#include <iostream>
#include <fstream>
#include <string>

class load
{

    public:
        load();
        //Create file
        void loadFile();
        //Check if file exists
        bool loadFile(std::string &name);
        //Return file
        std::string returnData();
        //print file contents
        std::string printFile(std::ifstream &output, std::string ifdata);
        //return int size
        int returnSize();
    private:
        std::string fileName;
        std::ifstream file;
        std::string IntroFile;
        std::string directory;
        std::string data;
        int size;
};

#endif //LOAD_H