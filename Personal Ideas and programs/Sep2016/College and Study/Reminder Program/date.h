#ifndef DATE_H
#define DATE_H

class date{
    public:
        void start();
        void createDateFile();
        void createGlobalFile();
        std::string getDate();
        void edit();
        void del();
        void create();
    private:
        bool running = true;
        char choice;
};



#endif