#include<stdio.h>
#include<stdlib.h>
void insert_sq();
void delete_sq();
void display_sq();

int sq[5],size=5,front=-1,rear=-1,value,del_value;

int main()
{
	int ch;
	while(1)
	{
		printf("\n1.Insert value ");
		printf("\n2.Delete value ");
		printf("\n3.Display value ");
		printf("\n4.Exit");
		printf("\n\nEnter your choice :- ");
		scanf("%d",&ch);

		switch(ch)
		{
			case 1: insert_sq();
				break;
			case 2: delete_sq();
				break;
			case 3: display_sq();
				break;
			case 4: exit(0);

			default:
				printf("\n Wrong choice");
				break;
		}
	}
}
void insert_sq()
{
	if(rear==(size-1))
	{
		printf("Queue is full");
	}
	else
	{
		if(front==-1 && rear==-1)
		{
			front=rear=0;
		}
		else
		{
			rear++;
		}
		printf("\nEnter the value :- ");
		scanf("%d",&value);
		sq[rear]=value;
	}
}
void delete_sq()
{
	if(front==-1 && rear==-1)
	{
		printf("\nQueue is empty");
	}
	else
	{
		if(front==rear)
		{
			front=rear=-1;
		}
		else
		{
			del_value=sq[front];
		printf("\nDeleted Value is :- %d ",del_value);
			front++;
		}
	}
}

void display_sq()
{
	int i;
	if(front==-1 && rear==-1)
	{
		printf("\nQueue is Empty");
	}
	else
	{
		for(i=front;i<=rear;i++)
		{
			printf("\t %d",sq[i]);
		}
	}
}




