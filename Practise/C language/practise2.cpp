#include<iostream>
using namespace std;

class base {
public:
    int b;

    base(int a) {
        b = a;
        cout << "Constructor: Setting b to " << b << endl;
    }

    void d1() {
        cout << "A:" << b << endl;
    }

    ~base() {
        // Add cleanup or modification here
        b = 1;
        cout << "Destructor: Setting b to " << b << endl;
    }

    void d2() {
        cout << "B:" << b;
    }
};

int main() {
    {
        base b(90);
        b.d1();
        b.d2();
    }

    return 0;
}

