#include <stdio.h>
#include <stdlib.h>


struct Samolot
{
    char * model;
    int liczba_silnikow;
    int liczba_pasazerow;
};

char * f(struct Samolot * tab,int n)
{
    int najnum = tab[0].liczba_pasazerow;
    char * mauy = tab[0].model;
    for (int i = 0; i<n; i++)
    {
        if (tab[i].liczba_pasazerow < najnum)
        {
            najnum = tab[i].liczba_pasazerow;
            mauy = tab[i].model;
        }
    }
    return mauy;
}

int main()
{
    unsigned int n = 5;

    struct Samolot tab[n];

    tab[0].model = "Sam1";
    tab[0].liczba_silnikow = 10;
    tab[0].liczba_pasazerow = 40;

    tab[1].model = "Sam2";
    tab[1].liczba_silnikow = 50;
    tab[1].liczba_pasazerow = 500;

    tab[2].model = "Sam3";
    tab[2].liczba_silnikow = 1;
    tab[2].liczba_pasazerow = 109;

    tab[3].model = "Sam4";
    tab[3].liczba_silnikow = 90;
    tab[3].liczba_pasazerow = 150;

    tab[4].model = "Sam5";
    tab[4].liczba_silnikow = 75;
    tab[4].liczba_pasazerow = 110;


    printf("%s",f(tab,n));
    return 0;
}
