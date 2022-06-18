#include <stdio.h>
#include <stdlib.h>

// tworzenie tablicy tablic
int **rezerwacja(int n, int m)
{
    int **tab=(int**)malloc(sizeof(int*)*n);
    for(int i=0;i<n;i++)
    {
        *(tab+i)=(int*)malloc(sizeof(int)*m);
    }
    return tab;
}

void wyswietl_tablice(int** tab, unsigned int n, unsigned int m)
{
    for(int y=0; y<n; y++)
    {
        for(int x=0; x<m; x++)
        {
            printf("%d\t", tab[y][x]);
        }
        printf("\n");
    }
}

// funckja z tablicą
int f(int** tab, int n, int m)
{
    int ilosc=0;
    for(int y=0; y<m; y++)
    {
        for(int x=0; x<n; x++)
        {
            if((tab[x][y]%2==0)&&(tab[x][y]<0))
            {
                ilosc++;
            }
        }
    }
    return ilosc;
}

int main()
{
    int** tab1 = rezerwacja(2, 3);
    tab1[0][0] = 12;
    tab1[0][1] = -14;
    tab1[0][2] = -25;
    tab1[1][0] = -22;
    tab1[1][1] = 252;
    tab1[1][2] = 25;
    wyswietl_tablice(tab1, 2, 3);

    printf("%d\n", f(tab1, 2, 3));

    return 0;
}
