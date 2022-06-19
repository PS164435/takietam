#include <stdio.h>
#include <stdlib.h>

struct node {
    float i;
    struct node* next;
};

struct node* utworz()
{
    struct node * wskaznik = malloc(sizeof(struct node));
    wskaznik->next=NULL;
    return wskaznik;
};

void dodaj(struct node* Lista, float a)
{
    struct node * wsk = malloc(sizeof(struct node));
    wsk->i=a;
    wsk->next=Lista->next;
    Lista->next=wsk;
};

void f(struct node* lista)
{
    float najmniejszaWartosc = 0;

    struct node* wsk = lista;
    while(wsk->next!=NULL){
        wsk = wsk->next;

        if(wsk->i < najmniejszaWartosc){
            najmniejszaWartosc = wsk->i;
        }
    }
    printf("%f\n", najmniejszaWartosc);
}

int main()
{
    struct node* lista = utworz();
    f(lista);
    dodaj(lista, 11.2421);
    dodaj(lista, 12.4);
    dodaj(lista, 0.21);
    dodaj(lista, -1.24);
    f(lista);

    return 0;
}
