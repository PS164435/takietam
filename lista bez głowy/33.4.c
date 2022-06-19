#include <stdio.h>
#include <stdlib.h>


struct node
{
    float x;
    struct node * next;
};

struct node * dodaj(struct node * lista, float a)
{
    struct node * cos = malloc(sizeof(struct node));
    cos -> x = a;
    cos -> next = lista;
    return cos;
};

int f(struct node * list)
{
    if(list==NULL)
        return 0;
    while(list!=NULL)
    {
        if(list->x <=0)
        {
            return 0;
        }
    list = list->next;
    }
    return 1;
}

int main()
{

    struct node* lista = NULL;
    lista = dodaj(lista,5.5);
    lista = dodaj(lista,4.3);
    lista = dodaj(lista,3.0);
    lista = dodaj(lista,1);

    printf("%d",f(lista));



    return 0;
}
