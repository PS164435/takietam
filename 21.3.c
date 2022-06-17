#include <stdio.h>
#include <stdlib.h>



struct Sportowiec
{
    char * imie;
    char * kraj;
    float rekord;
};

char * f(struct Sportowiec * tab,int n)
{
    int najnum = 0;
    char * mistrz = "nikt";
    for (int i = 0; i<n; i++)
    {
        if (tab[i].rekord > najnum)
        {
            najnum = tab[i].rekord;
            mistrz = tab[i].imie;
        }
    }
    return mistrz;
}

int main()
{
    unsigned int n = 5;

    struct Sportowiec tab[n];

    tab[0].imie = "Adam";
    tab[0].kraj = "Austria";
    tab[0].rekord = 400.20;

    tab[1].imie = "Bartek";
    tab[1].kraj = "Brazylia";
    tab[1].rekord = 50.12;

    tab[2].imie = "Czarek";
    tab[2].kraj = "Czechy";
    tab[2].rekord = 100.90;

    tab[3].imie = "Damian";
    tab[3].kraj = "Dania";
    tab[3].rekord = 550.00;

    tab[4].imie = "Edek";
    tab[4].kraj = "Estonia";
    tab[4].rekord = 111.11;


    printf("sportowiec z najwiekszym rekordem to: %s",f(tab,n));
    return 0;
}
