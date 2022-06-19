#include <stdio.h>
#include <stdlib.h>

struct node
{
double i;
struct node * next;
};

struct node* utworz()
{
    struct node * wskaznik = malloc(sizeof(struct node));
    wskaznik->next=NULL;
    return wskaznik;
};

void dodaj(struct node* Lista, double a)
{
    struct node * wsk = malloc(sizeof(struct node));
    wsk->i=a;
    wsk->next=Lista->next;
    Lista->next=wsk;
};

int f(struct node* lista)
{

    double max = 0;
    struct node * pom = lista;
    while(pom->next!=NULL)
        {
            pom = pom->next;
            if(pom->i > max)
            {
                max = pom->i;
            }
    }
    pom = lista;
    int id= -1;
    while(pom->i!=max)
    {
        pom = pom->next;
        id++;
    }
    return id;
}

int main()
{
    struct node* lista = utworz();
    dodaj(lista, 11.30);
    dodaj(lista, 12.4);
    dodaj(lista, 0.20);
    dodaj(lista, 1.20);
    printf("%d\n",f(lista));

    return 0;
}
