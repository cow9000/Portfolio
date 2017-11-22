#include <iostream>
#include <string>


int main(){
	
	long long a = 0;
	long long b = 1;
	long long c = 0;
	int n;
	std::cout << "n=";
	std::cin >> n;
	for(int i = 0; i < n; i++){
		//a1 + a2 = a3
		//a2 + a3 = a4
		//a3 + a4 = a5;
	
		if(i % 2 == 0){
		c = c + b;
		b = c;
		std::cout << c << std::endl;
		}else{
		c = a + b;
		a = c;
		std::cout << c << std::endl;
		}
	}
	std::cin >> n;
	return 0;
	
}