#include <stdio.h>
#include <stdlib.h>


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

int f(int** tab1,int** tab2, int n, int m)
{
    int ilosc=0;
    for(int j=0; j<m; j++)
    {
        for(int i=0; i<n; i++)
        {
            if(tab1[i][j]%2==0)
                ilosc++;
            if(tab2[i][j]%2==0)
                ilosc++;
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

    int** tab2 = rezerwacja(2, 3);
    tab2[0][0] = 11;
    tab2[0][1] = -11;
    tab2[0][2] = 0;
    tab2[1][0] = -0;
    tab2[1][1] = 251;
    tab2[1][2] = 25;

    wyswietl_tablice(tab1, 2, 3);
    wyswietl_tablice(tab2, 2, 3);

    printf("%d\n", f(tab1,tab2, 2, 3));

    return 0;
}
