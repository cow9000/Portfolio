#ifndef NETWORK_H
#define NETWORK_H

#include <iostream>
#include <string>
#include <vector>

class network{
    public:
        network();
        
        //Creation
        void createNeuron();
        void createLink();
        
        //Mutations
        void mutateNetwork();
        
        
        //Return values
        int returnSpecies();
        int returnFitness();
        int returnId();
        bool returnTested();
        
    private:
        bool tested
        int species;
        int fitness;
        int netId;
        std::vector<neuron> neurons;
        std::vector<link> links;
};

#endif //NETWORK_H