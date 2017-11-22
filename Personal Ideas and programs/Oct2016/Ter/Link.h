#ifndef LINK_H
#define LINK_H

#include <random>
#include <iostream>
#include <ctime>
#include <string>

class Link{
    public:
        Link(double w, int n1, int n2, int gid, int netid, int id, bool dis){
            weight = w;
            x1 = n1;
            x2 = n2;
            GenomeId = gid;
            NetworkId = netid;
            Id = id;
            //Disabled does not mean it doesn't work, it means if Link is touched by Monster, Enable the input
            Disabled = dis;
        }
        
        double returnWeight(){
        
            return weight;
        
        }
        
        int returnX1(){
        
            return x1;
        
        }
        
        int returnX2(){
        
            return x2;
        
        }
        
        int returnGenomeId(){
        
            return GenomeId;
        
        }
        
        int returnNetworkId(){
        
            return NetworkId;
        
        }
        
        int returnId(){
        
            return Id;
        
        }
        
        std::string Connected(){
        
            return x1 + "/" + x2;
        
        }
        
    private:
        double weight;
        int x1;
        int x2;
        int GenomeId;
        int NetworkId;
        int Id;
        bool Disabled;
};


#endif