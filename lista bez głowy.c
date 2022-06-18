#include <stdio.h>
#include <stdlib.h>

// struktura, czyli lista bez g�owy
struct node
{
    float liczba;
    struct node* next;
};

// funkcja dodawania element�w do listy
struct node* dodaj(struct node*Lista, float a)
{
    struct node * wsk = malloc(sizeof(struct node));
    wsk->liczba=a;
    wsk->next=Lista;
    return wsk;
};

// funkcja przyjmuj�ca struktur� jako argument
// "Funkcja ma wy�wietli� na konsoli najmniejsz� warto�� warto�� w�r�d warto�ci ujemnych na li�cie.
// W przypadku pustej listy lub braku element�w ujemnych, zwr�� zero. Stw�rz przypadek testowy"
void f(struct node* x)
{
    float najmniejsza = 0;
    struct node* pom = x;

    while(pom!=NULL)
        {
            if(pom->liczba<najmniejsza)
                {
                    najmniejsza = pom->liczba;
                }
            //printf("%f\n", pom->i);
            pom = pom->next;
        }
    printf("%f\n", najmniejsza);
}

int main()
{
    struct node* lista = NULL;
    lista = dodaj(lista, 12.12123);
    lista = dodaj(lista, -123.1251);
    lista = dodaj(lista, 135);
    lista = dodaj(lista, -135);
    lista = dodaj(lista, -789.123);
    lista = dodaj(lista, 0.0);

    f(lista);

    return 0;
}
