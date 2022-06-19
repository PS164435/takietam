#include <stdio.h>
#include <stdlib.h>

int **rezerw(int n, int m)
{
    int ** t = (int**)malloc(sizeof(int*)*n);
    for(int i=0;i<n;i++)
    {
        *(t+i)=(int*)malloc(sizeof(int)*m);
    }
    return t;
}

int fun(int ** tab, int n, int m)
{
    int suma = 0;
     for(int i=0;i<n;i++)
         for(int j=0;j<m;j++)
            if(i%2==1)
                suma += pow(tab[i][j],2);


    return suma;
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

int main()
{
    int ** tabela1 = rezerw(3,4);
    tabela1[0][0] = 1;
    tabela1[0][1] = 2;
    tabela1[0][2] = 3;
    tabela1[0][3] = 1;
    tabela1[1][0] = -1;
    tabela1[1][1] = -2;
    tabela1[1][2] = -3;
    tabela1[1][3] = 1;
    tabela1[2][0] = 1;
    tabela1[2][1] = 1;
    tabela1[2][2] = 1;
    tabela1[2][3] = 1;




    wyswietl_tablice(tabela1, 3, 4);
    printf("%d\n",fun(tabela1,3,4));

    return 0;
}
