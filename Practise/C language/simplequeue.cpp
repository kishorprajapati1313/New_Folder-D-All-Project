#include<stdio.h>
#include<stdlib.h>

int n,size=5,stack[5],value,del_value,front = -1, rear = -1;

void push(){
	if(rear == size - 1){
		printf("\nQueue is full");
	}else{
		rear++;
		printf("\nEnter your value");
		scanf("%d",&value);
		stack[rear] = value;
		
		if(front == -1){
			front = 0;
		}
	}
}

void pop(){
	if(front == -1){
		printf("\nQueue is Empty");
	}else{
		del_value = stack[front];
		printf("\nYOur deleted Number is %d", del_value);
		front++;
	}
}

void dis(){
	if(front == -1 && rear == -1){
		printf("There is no Queue To display");
	}else{
		for(int i=front;i<=rear;i++){
			printf("%d", stack[i]);
		}
	}
}

int main(){
	printf("This Is Simple Queue");
	
	while(1){
		printf("\n1.push\n2.pop\n3.Display\n4.exit");
		printf("Enter your number according you Expression:");
		scanf("%d",&n);
		
		switch(n){
			case 1:push();
					break;
			case 2:pop();
					break;
			case 3:dis();
					break;
			case 4:exit(0);
					break;
		}
	}
}
