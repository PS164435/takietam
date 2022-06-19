#include <stdio.h>
#include <stdlib.h>


float fun(int tab[][10], int a)
{
    return 0.2;
}

int **rezerwacja(int n, int m)
{
    int **tab=(int**)malloc(sizeof(int*)*n);
    for(int i=0;i<n;i++)
    {
        *(tab+i)=(int*)malloc(sizeof(int)*m);
    }
    return tab;
}


int main()
{

    int** tab = rezerwacja(2, 10);
    printf("%f",fun(tab,8));

    return 0;
}
