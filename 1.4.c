#include <stdio.h>
#include <stdlib.h>


struct element
{
int x;
struct element * next;
};

struct element * dodaj(struct element*Lista, int a)
{
    struct element * wsk = malloc(sizeof(struct element));
    wsk->x=a;
    wsk->next=Lista;
    return wsk;
};

void f(struct element* s, int w)
{
    while(s!=NULL)
    {
        s->x *= w;
        s = s->next;
    }
}

void wyswietl_liste(struct element* s)
{
    while(s!=NULL)
    {
        printf("%d\n",s->x);
       s = s->next;
    }
}

int main()
{
    struct node* lista = NULL;
    lista = dodaj(lista, 1);
    lista = dodaj(lista, 3);
    lista = dodaj(lista, 0);
    lista = dodaj(lista, -2);

    wyswietl_liste(lista);

    f(lista,3);

    wyswietl_liste(lista);



    return 0;
}
