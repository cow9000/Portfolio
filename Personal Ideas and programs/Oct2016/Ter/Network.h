#ifndef NETWORK_H
#define NETWORK_H

#include "Neuron.h"
#include "Genome.h"
#include "Node.h"
#include "Link.h"

#include <vector>
#include <random>
#include <iostream>
#include <ctime>
#include <cstdlib>

double randDouble(double low, double high)
{
    double temp;
    if (low > high)
    {
        temp = low;
        low = high;
        high = temp;
    }
    /* calculate the random number & return it */
    temp = (rand() / (static_cast<double>(RAND_MAX) + 1.0))
    * (high - low) + low;
    return temp;
}



class Network{
    public:
        Network(int i, int n){
            //In here I need to link the neurons and stuff together, not sure how to though.
            //Maybe just randomize it and make a structure. Whatever works right? :P
            //I will probably link em together in the Neuron class and make a Link class to link em together
            NodeAmount = 1;
            std::cout << i << std::endl;
            this->LinkAmount = 0;
            this->LinkId = 0;
            this->Id = i;
            this->GenomeId = i;
            
            //NEED TO CREATE NODES AND THEN LINK THEM TO MAP
            if(NodeAmount != 0){
                for(int i = 0; i < NodeAmount; i++){
                    std::cout << "NODE CREATED" << std::endl;
                }
            }
            for(int z = 0; z < n + 1; z++){
                Neuron n(i, z);
                InputNeurons.push_back(n);
                //Connect Neurons to Nodes
                if(NodeAmount != 0){
                    if(randDouble(0.0,1.0) <= LinkMutationChance){
                        createLink(n);
                        LinkAmount++;
                    }
                }
                //Nodes need to connect to output MAP or ALWAYS.
                //ALWAYS MEAN ALWAYS PRESS UNLESS IT SAYS NOT TOO
                //ConnectNodeToOutput()
                
            }
            if(LinkAmount != 0){
                std::vector<Link> tempLink = returnLinkVector();
                for(auto it2 = begin (tempLink); it2 != end (tempLink); ++it2){
                    std::cout << "Network " << returnId() << ", Link weight " << it2->returnWeight() << ", \nConnected Input " << std::to_string(it2->returnX1()) << "----- To Node -----" << std::to_string(it2->returnX2()) << std::endl;
                }
            }

            
        }
        
        void MutateGenome(Neuron n){

            if(randDouble(0.0,2.0) >= 1){
            
                MutateConnectionsChance = 0.95 * MutateConnectionsChance;
                PerturbChance = 0.95 * PerturbChance;
                CrossoverChance = 0.95 * CrossoverChance;
                LinkMutationChance = 0.95 * LinkMutationChance;
                NodeMutationChance = 0.95 * NodeMutationChance;
                BiasMutationChance = 0.95 * BiasMutationChance;
                StepSize = 0.95 * StepSize;
                DisableMutationChance = 0.95 * DisableMutationChance;
                EnableMutationChance = 0.95 * EnableMutationChance;
            
            }else{
                MutateConnectionsChance = 1.05263 * MutateConnectionsChance;
                PerturbChance = 1.05263 * PerturbChance;
                CrossoverChance = 1.05263 * CrossoverChance;
                LinkMutationChance = 1.05263 * LinkMutationChance;
                NodeMutationChance = 1.05263 * NodeMutationChance;
                BiasMutationChance = 1.05263 * BiasMutationChance;
                StepSize = 1.05263 * StepSize;
                DisableMutationChance = 1.05263 * DisableMutationChance;
                EnableMutationChance = 1.05263 * EnableMutationChance;
            }
        }
        
        void MutateGenome(int e){

            //Not sure if I need this

        }
        
        int neuronSize(){
        
            return InputNeurons.size();
        
        }
        
        int nodeSize(){
        
            return nodes.size();
        
        }
        
        int returnId(){
        
            return Id;
        
        }
        
        
        void createLink(Neuron n){
        
            int xRan2;
            // This will ensure a really randomized number by help of time.
            if(NodeAmount != 0){
                xRan2=rand()%NodeAmount;
            }
            //IF IT GETS TO X, 
            if(randDouble(0.0,1.0) < DisableMutationChance){
                bool disabled = true;
            }
            
            bool disabled = false;
            double w = randDouble(0.0,10.0);
            int n1 = n.returnId();
            int n2 = xRan2;
            int gid = n.returnGenomeId();
            int netid = n.returnNetworkId();
            Link l(w,n1,n2,gid,netid,LinkId,disabled);
            n.InsertIntoLinks(l);
            links.push_back(l);
            LinkId += 1;
        }
        
        //CHANGE THIS SO IT TAKES NODE INPUT
        /*void createLink(Node n){
        
            int xRan2;
            // This will ensure a really randomized number by help of time.
            if(NodeAmount != 0){
                xRan2=rand()%NodeAmount;
            }
            //IF IT GETS TO X, 
            if(randDouble(0.0,10.0)){
                bool disabled = true;
            }
            bool disabled = false;
            double w = randDouble(0.0,10.0);
            int n1 = n.returnId();
            int n2 = xRan2;
            int gid = n.returnGenomeId();
            int netid = n.returnNetworkId();
            Link l(w,n1,n2,gid,netid,LinkId,disabled);
            n.InsertIntoLinks(l);
            links.push_back(l);
            LinkId += 1;
        }*/
        
        
        std::vector<Link> returnLinkVector(){
        
            return links;
        
        }
        //CREATE A FUNCTION TO RETURN THE NODE, LINK, OR NEURON BASED ON ID(INT).
        
    private:
        std::vector<Neuron> InputNeurons;
        std::vector<Node> nodes;
        std::vector<Link> links;
        int LinkAmount;
        int LinkId;
        int NodeAmount;
        int Id;
        int GenomeId;
        int Fitness;
        double MutateConnectionsChance = 0.25;
        double PerturbChance = 0.90;
        double CrossoverChance = 0.75;
        double LinkMutationChance = 2.0;
        double NodeMutationChance = 0.50;
        double BiasMutationChance = 0.40;
        double StepSize = 0.1;
        double DisableMutationChance = 0.4;
        double EnableMutationChance = 0.2;

};

#endif //NETWORK_H