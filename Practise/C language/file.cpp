#include<stdio.h>
#include<stdlib.h>

int main(){
	FILE *p;
	char a[10] = "good", b[90];
	p=fopen("p.text","w");
	fputs(a,p);
	fprintf(p,"\n hiiiiiiiiiiii \n");
	fclose(p);
	
	fopen("p.text","r");
	fscanf(p,"%s",a);
	fgets(b,90,p);
	printf("your word is %s",a);
	
	fclose(p);
	return 0;
}
