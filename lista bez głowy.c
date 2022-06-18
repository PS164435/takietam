#include <stdio.h>
#include <stdlib.h>

// struktura, czyli lista bez g³owy
struct node
{
    float liczba;
    struct node* next;
};

// funkcja dodawania elementów do listy
struct node* dodaj(struct node*Lista, float a)
{
    struct node * wsk = malloc(sizeof(struct node));
    wsk->liczba=a;
    wsk->next=Lista;
    return wsk;
};

// funkcja przyjmuj¹ca strukturê jako argument
// "Funkcja ma wyœwietliæ na konsoli najmniejsz¹ wartoœæ wartoœæ wœród wartoœci ujemnych na liœcie.
// W przypadku pustej listy lub braku elementów ujemnych, zwróæ zero. Stwórz przypadek testowy"
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
