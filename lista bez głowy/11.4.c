#include <stdio.h>
#include <stdlib.h>

struct node
{
int i;
struct node * next;
};


struct node* dodaj(struct node*Lista, float a)
{
    struct node * wsk = malloc(sizeof(struct node));
    wsk->i=a;
    wsk->next=Lista;
    return wsk;
};

void f(struct node* el)
{
    while(el!=NULL)
        {
            if(el->i%2!=0)
                {
                    printf("%d\n",el->i);
                }

            el = el->next;
        }
}



void wyswietl_liste(struct node* s)
{
    while(s!=NULL)
    {
        printf("%d\n",s->i);
       s = s->next;
    }
}

int main()
{
    struct node* lista = NULL;
    lista = dodaj(lista, 12);
    lista = dodaj(lista, -123);
    lista = dodaj(lista, 0);

    f(lista);


    return 0;
}
