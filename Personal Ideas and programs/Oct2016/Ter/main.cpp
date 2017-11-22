//Ter a bot to play video games
//Things to do - 
//Need to find out how to read memory addresses and return playerx and playery
//Be able to read map in a way bot can understand
//Create a pool - Refer to http://pastebin.com/ZZmSNaHX ln200
//Create species - Refer to http://pastebin.com/ZZmSNaHX ln213
//Genomes
//Genes
//Neurons
//Fitness
//Removing bad species and unresponsive ones

//LINKS - 
//http://nn.cs.utexas.edu/downloads/papers/stanley.ec02.pdf
//http://pastebin.com/ZZmSNaHX


/*
*From what I understand - This is how the AI works,
*You start out with a population of x, this is how many you will have to test so x,
*Then after it is done testing it will get the average fitness rate and sort the most successful of the population from best to worst
*Then eliminate about 175, lowest having the highest change of destruction and the highest having the lowest change of destruction
*After they are all destroyed, have the new population build off of the surviving generations and then have a change of randomly mutating hence generation x
*
*
*
*
*Neurons connect to nodes
*
*
*0 Node is always running unless Link Class Disables it.
*
*
*
*/

//Start out with a set population
//The maximum amount of nodes a Genome can have is equal to the number of inputs.

#include <iostream>
#include <ctime>
#include "Terbot.h"
#include "Genome.h"
#include "Neuron.h"
#include "Network.h"
#include "Link.h"

int main(){
    srand ( time(NULL) );
    Main ter;
    std::cin.get();
}