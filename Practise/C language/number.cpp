
#include<stdio.h>

int main()
{
	float rupee,data,day,perday;
	
	printf("Enter your plane Day:");
	scanf("%f",&day);
	printf("Enter your rupees:");
	scanf("%f",&rupee);

	
	perday = (1 * rupee)/day;
	
	printf("Your 1GB data perday ruppes:%f",perday);
}
