#ifndef DYNAMIC_SEQUENCE__SEQUENCE_H
#define DYNAMIC_SEQUENCE__SEQUENCE_H

// This is a sequence with a dynamic capacity.
// It must support value semantics: assignments and the copy constructor
// may be used with sequence objects.

// No implementation is provided,
// please create a sequence.cpp file. You should not need to make any changes
// to this header file.
class sequence
{
public:
    // TYPEDEFS and MEMBER CONSTANTS

		// The data type of the items in the sequence. Can be changed to
		// be any of the C++ built-in types (int, char, etc.), or a class with a
		// default constructor, an assignment operator, and a copy constructor.
		typedef double value_type;

		// Initial capacity of a sequence that is created by the default constructor.
        static const int DEFAULT_CAPACITY = 5;


    // CONSTRUCTORS and DESTRUCTOR

		// Initializes an empty sequence.
		// The insert/attach functions will work efficiently (without allocating
		// new memory) until this capacity is reached.
    sequence(int initial_capacity = DEFAULT_CAPACITY);

		// Makes a deep copy of the source sequence.
    sequence(const sequence& source);

		// Destroys all dynamically allocated memory.
    ~sequence( );


    // MODIFICATION MEMBER FUNCTIONS

		// Changes the sequence's current capacity to `new_capacity`
		// (but not less than size()).
		// The insert/attach functions will work efficiently (without
		// allocating new memory) until this new capacity is reached.
    void resize(int new_capacity);

		// Sets the first item in the sequence as the current item
	 	// (but if the sequence is empty, then there is no current item).
    void start( );

		// Sets the current item to the immediately following item.
		// If the current item was already the last item in the sequence,
		// then there will no longer be any current item.
		// Precondition: is_item returns true.
		void advance( );

		// Inserts a new copy of `entry` in the sequencebefore the current item.
		// If there was no current item, then the new entry is inserted at the
		// front of the sequence. In either case, the newly inserted item will
		// be the current item of the sequence.
    void insert(const value_type& entry);

		// Inserts a new copy of entry in the sequence after the current item.
		// If there was no current item, then the new entry is attached to the
		// end of the sequence. In either case, the newly
		// inserted item will be the current item of the sequence.
    void attach(const value_type& entry);


		// Removes the current item from the sequence, and sets the
		// following item (if there is one) as current.
		// Precondition: is_item returns true.
    void remove_current( );

		// Replaces the current sequence with a deep copy of `source`.
		// Unused dynamic memory is deallocated.
    void operator =(const sequence& source);


    // CONSTANT MEMBER FUNCTIONS

		// Returns the number of items in the sequence.
    int size( ) const;

		// Returns true if there there is a current item, which may be retrieved
		// by calling current().
		// Returns false if there is no valid current item.
    bool is_item( ) const;

		// Returns the current item in the sequence.
		// Precondition: is_item( ) returns true.
    value_type current( ) const;

private:
    value_type* data;
    int used;
    int current_index;
    int capacity;
};


#endif
