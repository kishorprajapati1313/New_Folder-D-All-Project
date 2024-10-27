#include<stdio.h>
#include<stdlib.h>
int size = 5;
int stack[5],top=-1,n;

int push(){
	if(top==(size-1)){
		printf("Stack is overflow");
	}else{
		top++;
		printf("Enter your number:");
		scanf("%d",&n);
		stack[top] = n;
	}
}

int pop(){
	if(top==-1){
		printf("tack is Underflow");
	}else{
		int del = stack[top];
		printf("Deleted value:%d",del);
		top--;
	}
	
}
int dis(){
	for(int i=0;i<=top;i++){
		printf("Values Of Stack:%d\n",stack[i]);
	}
}

int main(){
	int num;
	
	while(1){
			printf("\n1)Push\n2)Pop\n3)display\n4)Exit\n");
			printf("enter Your number 1-4:");
			scanf("%d",&num);
		switch(num){
			case 1:push();
					break;
			case 2:pop();
					break;
			case 3:dis();
					break;
			case 4:exit(0);
			default:printf("Enter valid Number:");
		}
	}
		
}
