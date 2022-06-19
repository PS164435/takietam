#include <stdio.h>
#include <stdlib.h>


struct element
{
float x;
struct element * next;
};

struct element* dodaj(struct element*Lista, float a)
{
    struct element * wsk = malloc(sizeof(struct element));
    wsk->x=a;
    wsk->next=Lista;
    return wsk;
};

void f(struct element* el)
{
    while(el!=NULL)
        {
            if(el->x<0)
                {
                    el->x*=-1;
                }

            el = el->next;
        }
}


void wyswietl_liste(struct element* s)
{
    while(s!=NULL)
    {
        printf("%f\n",s->x);
       s = s->next;
    }
}

int main()
{
    struct node* lista = NULL;
    lista = dodaj(lista, 12.1212);
    lista = dodaj(lista, -123.123);
    lista = dodaj(lista, 0);


    wyswietl_liste(lista);
    f(lista);
    wyswietl_liste(lista);


    return 0;
}
