#include <stdio.h>
#include <stdlib.h>




struct Osoba
{
    char * imie;
    int wiek;
    float wzrost;
};

char * f(struct Osoba * tab,int n)
{
    int najnum = 0;
    char * mistrz = tab[0].imie;
    for (int i = 0; i<n; i++)
    {
        if (tab[i].wzrost > najnum)
        {
            najnum = tab[i].wzrost;
            mistrz = tab[i].imie;
        }
    }
    return mistrz;
}

int main()
{
    unsigned int n = 5;

    struct Osoba tab[n];

    tab[0].imie = "Adam";
    tab[0].wiek = 17;
    tab[0].wzrost = 170;

    tab[1].imie = "Bartek";
    tab[1].wiek = 18;
    tab[1].wzrost = 180;

    tab[2].imie = "Czarek";
    tab[2].wiek = 20;
    tab[2].wzrost = 160;

    printf("%s",f(tab,n));
    return 0;
}
