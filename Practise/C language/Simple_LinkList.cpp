#include<stdio.h>
#include<stdlib.h>

struct node {
    int data;
    struct node* next;
};

int main() {
    struct node* head = NULL;
    struct node* newnode;
    int ch, value;

    do {
        printf("\n1) Insert the node\n2) Display\n0) Exit\n");
        printf("Enter Your Choice: ");
        scanf("%d", &ch);

        switch (ch) {
            case 1:
                if (head == NULL) {
                    head = newnode = (struct node*)malloc(sizeof(struct node));
                } else {
                    newnode->next = (struct node*)malloc(sizeof(struct node));
                    newnode = newnode->next;
                }
                printf("Enter Your Value to Input Node: ");
                scanf("%d", &value);

                newnode->data = value;
                newnode->next = NULL;
                break;

            case 2:
                if (head == NULL) {
                    printf("Linked list is empty.\n");
                } else {
                      if (head == NULL) {
					        printf("Linked list is empty.\n");
					    } else {
					        struct node* temp = head;
					        while (temp != NULL) {
					            printf("+--------+      ");
					            temp = temp->next;
					        }
					        printf("\n");
					
					        temp = head;
					        while (temp != NULL) {
					            printf("|   %2d   | ---->", temp->data);
					            temp = temp->next;
					        }
					        printf("\n");
					
					        temp = head;
					        while (temp != NULL) {
					            printf("+--------+      ");
					            temp = temp->next;
					        }
					        printf("\n");
                    }
                }
                break;

            case 0:
                printf("Exiting the program.\n");
                break;

            default:
                printf("Enter Right Number.\n");
        }

    } while (ch != 0);


    return 0;
}

