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

int f(int** tab1,int** tab2, int n, int m)
{
 int ilosc = 0;
 for (int i=0; i<n; i++)
 {
     for (int j=0; j<m; j++)
     {
         if(tab1[i][j]!=tab2[i][j])
            ilosc++;
     }
 }
 return ilosc;
}

int main()
{
    int** tab1 = rezerwacja(2, 2);
    tab1[0][0] = 12;
    tab1[0][1] = 13;
    tab1[1][0] = 14;
    tab1[1][1] = 15;

    int** tab2 = rezerwacja(2, 2);
    tab2[0][0] = 12;
    tab2[0][1] = 13;
    tab2[1][0] = 10;
    tab2[1][1] = 15;

    printf("%d",f(tab1,tab2,2,2));

    return 0;
}
