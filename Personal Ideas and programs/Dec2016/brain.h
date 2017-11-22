#ifndef BRAIN_H
#define BRAIN_H

#include "network.h"

#include <vector>

#define POP 300

class brain{

    public:
        brain();
        
        //void createNeuron(); Moved to network
        void createNetwork();
        void startSim();
        
        
    private:
        
        std::vector<network> networks;
        int generation;
        
        
        
};

#endif // BRAIN_H