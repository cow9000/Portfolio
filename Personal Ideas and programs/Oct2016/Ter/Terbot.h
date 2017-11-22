#ifndef TERBOT_H
#define TERBOT_H

#define POP 300

//Include Genome.h for the access to the Genome class
#include "Genome.h"

#include <string>
#include <vector>

class Genome;


class Main{
    public:
        //Constructor
        Main() {
            //Make generation 1
            generation = 1;
            //INSERT INPUTS
            inputs.push_back('A');
            inputs.push_back('W');
            inputs.push_back('S');
            inputs.push_back('D');
            inputs.push_back('X');
            
            int n = inputs.size();
            
            population = POP;
            for(int i = 0; i < population + 1; i++)
                genomes.push_back(Genome(i, n));
        }
        
    private:
        //How many Genomes to create and using math
        int population;
        //Create a vector to store all the 300 Genomes for later use.
        std::vector<Genome> genomes;
        //To determine how many neurons
        std::vector<char> inputs;
        //Generation
        int generation;
};


#endif //TERBOT_H
