#include <stdio.h>
#include <stdlib.h>

int porownaj(int * tab1, int * tab2, int n)
{
    int suma1 = 0;
    int suma2 = 0;
    for (int i=0; i<n;i++)
    {
        if(tab1[i]%2!=0)
            suma1+=tab1[i];
        if(tab2[i]%2!=0)
            suma2+=tab2[i];
    }
    if(suma1==suma2)
        return 1;
    return 0;
}

void wyswietl_tablice(int* tab, unsigned int n)
{
        for(int i=0; i<n; i++)
        {
            printf("%d\t", tab[i]);
        }
        printf("\n");
}

int main()
{

    int tab1[4];
    tab1[0] = 1;
    tab1[1] = 3;
    tab1[2] = 4;
    tab1[3] = 6;

    int tab2[4];
    tab2[0] = -2;
    tab2[1] = -3;
    tab2[2] = 7;
    tab2[3] = 0;

    wyswietl_tablice(tab1,4);
    wyswietl_tablice(tab2,4);

    printf("%d",porownaj(tab1,tab2,4));

    return 0;
}
