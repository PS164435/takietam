#include <stdio.h>
#include <stdlib.h>
#include <math.h>

struct node
{
int i;
struct node * next;
};

struct node* dodaj(struct node*Lista, int a)
{
    struct node * wsk = malloc(sizeof(struct node));
    wsk->i=a;
    wsk->next=Lista;
    return wsk;
};

void f(struct node* x)
{
    struct node* pom = x;

    while(pom!=NULL)
    {
        if(sqrt(pom->i) - floor(sqrt(pom->i))==0)
        {
            printf("%f\n",sqrt(pom->i));
        }
        pom = pom->next;
    }
}

int main()
{
    struct node* lista = NULL;
    lista = dodaj(lista, 12);
    lista = dodaj(lista, 50);
    lista = dodaj(lista, 25);
    lista = dodaj(lista, 36);
    lista = dodaj(lista, 56);
    lista = dodaj(lista, 1);

    f(lista);

    return 0;
}
