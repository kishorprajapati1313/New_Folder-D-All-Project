#include<iostream>
using namespace std;

char name[10] = "i am kp";
int main(){
	char name[10] = "i am rk";
	cout<<"Hello "<<::name;
	cout<<"\nHello "<<name;
	
}
