//Josh Vawdrey
//CS 2420 - Section 601
//7:00-8:15
//Disclaimer:
/*I, Josh Vawdrey, have not used any code other than my own (or that in the textbook) for this project. I
also have not used any function or data-structure from the Standard-Template Library. I also
have not shared my code with any student in this class. I understand that any violation of this
disclaimer will result in a 0 for the project.*/

#include "sequence.h"
//According to sequence.h, this should create a new sequence with the default capacity.
	sequence::sequence (int initial_capacity)
	{
		data = new value_type[initial_capacity];
		used = 0;
		current_index = 0;
		capacity = initial_capacity;
	}

//This should create a deep copy of the sequence
	sequence::sequence(const sequence& source)
	{
		//This should create a new data array of the value type with the capacity that the original had
		double* new_data = new value_type[source.capacity];
        
        
		for(int i = 0; i < source.used; i++)
		{
            if(i < source.used){
			new_data[i] = source.data[i];
			
            used++;
            }
		}
	}

//This should delete the sequence
	sequence::~sequence()
	{
		delete[] data;
	}

//Alright, so this should change the size of the capacity 	
	void sequence::resize(int new_capacity)
	{
		data = new double[new_capacity];
		capacity = new_capacity;
		current_index = 0;
	}
	
	//So this one will target the first thing in the sequence
	void sequence::start()
	{
		current_index = 0;
	}
	void sequence::advance() //This appears to be the problem
	{
		current_index++;
		if(is_item() == false)
		{
			current_index--;
			return;
		}
	}
	//insert at the very beginning
	void sequence::insert(const value_type& entry)
	{
		if (used < capacity)
		{
			++used;
			for(int i = 0; i < used; ++i)
			{
				data[used - i] = data[used - i - 1]; //This allows it to work from the beginning.
			}
			data[0] = entry;			
			
		}
		else
		{
			for(int i = 1; i < used; ++i)
			{
				data[used - i] = data[used - i - 1];
			}
			data[0] = entry;
		}	
	}
	
	void sequence::attach (const value_type& entry)
	{
		//take the current index variable and say, "Okay, program, put this after this number. If it is at full capacity, then it is good"
		//Current problem: If 'attach' is used first and 'advance' has been used, then it doesn't
		//Fixed! Change data changes in for loop to start at the end and work downward.
		if(is_item() == true)
		{
			if(used < capacity)
			{
				used++;
		
				for(int i = 0; i < used - current_index; ++i)
				{
					data[used - i] = data[used - i - 1];

				}
					data[current_index + 1] = entry; 
			}
			
		}
		else
		{
			used++;
			data[current_index] = entry;
		}
	}
	double sequence::current() const //Returns current_index
	{
		return data[current_index];
	}
	void sequence::remove_current() //remove_current is working now.
	{
		if(is_item() == true)
		{
			
			for(int i = current_index; i < capacity; i++)
			{
				data[i] = data[i + 1];
					
			}
			--used;
		}
	}
	//Ahhh, operator. You are crazy.
	void sequence::operator =(const sequence& source)
	{
		value_type *new_sequence;
		if(this == &source)
		{
			return;
		}
		else
		{
			new_sequence = new value_type[source.capacity];
			delete[] data;
			data = new_sequence;
			capacity = source.capacity;
			used = source.used;
		}
		
	}
	
	int sequence::size () const //Should just return used from the header file. The attach and insert functions work through this
	{
		return used;
	}
	
	bool sequence::is_item() const //So I want this to be true if the number is inside the current_index is officially inside the array
	{
		if(current_index < used && current_index > -1)
		{
			return true;
		}
		return false;
	}
	


/*Left over code from efforts on trying to make attach work.
/*else
			{
				for(int i = current_index + 1; i + 1 < used; ++i)
				{
					data[i+1] = data[i];
				}
					data[current_index + 1] = entry; 
			}*/