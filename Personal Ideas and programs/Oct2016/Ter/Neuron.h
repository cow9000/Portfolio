#ifndef NEURON_H
#define NEURON_H

#include <iostream>
#include <vector>
#include "Link.h"

class Neuron{
    public:
        Neuron(int g, int i){
            this->GenomeId = g;
            this->NetworkId = g;
            this->Id = i;
            std::cout << "Connected to NETWORKNUMBER(GENOME) - " << GenomeId << std::endl;
            
        }
        
        int returnId() {
            return this->Id;
        }
        
        int returnGenomeId() {
            return this->GenomeId;
        }
        
        int returnNetworkId() {
            return this->NetworkId;
        }
        
        void InsertIntoLinks(Link &l){
            links.push_back(l);
        }
        
        std::vector<Link> returnLinkVector(){
            return links;
        }
        
    private:
        int GenomeId;
        int NetworkId; 
        int Id;
        //Links between, Links need weight
        std::vector<Link> links;
        
};

#endif