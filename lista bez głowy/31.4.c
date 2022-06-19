#include <stdio.h>
#include <stdlib.h>


struct element
{
int x;
struct element * next;
};

struct element* dodaj(struct element*Lista, float a)
{
    struct element * wsk = malloc(sizeof(struct element));
    wsk->x=a;
    wsk->next=Lista;
    return wsk;
};

int f(struct element* list, int w)
{
    int s = 0;

    while(list!=NULL)
        {
            if(list->x==w)
                {
                    s++;
                }
            list = list->next;
        }
    return s;
}


int main()
{
    struct element* lista = NULL;
    lista = dodaj(lista, 50);
    lista = dodaj(lista, 15);
    lista = dodaj(lista, 50);
    lista = dodaj(lista, 35);
    lista = dodaj(lista, 350);
    lista = dodaj(lista, 50);

    printf("%d",f(lista,50));

    return 0;
}
