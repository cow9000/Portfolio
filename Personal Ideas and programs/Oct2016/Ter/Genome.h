#ifndef GENOME_H
#define GENOME_H

#include "Neuron.h"
#include "Network.h"
#include <vector>
#include <iostream>


class Genome{
    public:
        //i is the id of the Genome, and n is the amount of neurons to create
        Genome(int i, int n){
            a = new Network(i,n);
            
        }
        
        void MutateGenome(int e){
            
            a->MutateGenome(e);

        }
        
    private:
        //1-300
        int Id;
        int Species;
        //This is the neurons in its thing
        Network* a;
        //Add genes?
        
};


#endif