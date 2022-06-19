#include <stdio.h>
#include <stdlib.h>

struct Osoba
{
    char * imie;
    int wiek;
    float wzrost;
};

char * f(struct Osoba * tab, int n)
{
    int najn = 0;
    char * najim = "nikt";
    for (int i=0;i<n;i++)
    {
        if(tab[i].wiek > najn)
        {
            najn = tab[i].wiek;
            najim = tab[i].imie;
        }
    }
    return najim;
}


int main()
{
    unsigned int n = 4;

    struct Osoba tab[n];

    tab[0].imie = "AAA";
    tab[0].wiek = 67;
    tab[0].wzrost = 157;

    tab[1].imie = "BBB";
    tab[1].wiek = 89;
    tab[1].wzrost = 190;

    tab[2].imie = "CCC";
    tab[2].wiek = 43;
    tab[2].wzrost = 176;

    tab[3].imie = "DDD";
    tab[3].wiek = 15;
    tab[3].wzrost = 102;

    printf("%s",f(tab,n));

    return 0;
}
