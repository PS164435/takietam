#include <stdio.h>
#include <stdlib.h>

// int n i int m musi by³ przed tablicami bo wywali
int f(int n, int m,int tab1 [n][m],int tab2[n][m])
{
    int ilosc=0;
    for(int y=0; y<m; y++)
    {
        for(int x=0; x<n; x++)
        {
            if(tab1[x][y]<0)
            {
                ilosc++;
            }
            if(tab2[x][y]<0)
            {
                ilosc++;
            }
        }
    }
    return ilosc;
}

int main()
{
    int tab1[2][3];
    tab1[0][0] = 1;
    tab1[0][1] = 2;
    tab1[0][2] = 3;
    tab1[1][0] = 4;
    tab1[1][1] = -5;
    tab1[1][2] = -6;

    int tab2[2][3];
    tab2[0][0] = 0;
    tab2[0][1] = -1;
    tab2[0][2] = 2;
    tab2[1][0] = -1;
    tab2[1][1] = 11;
    tab2[1][2] = -12;

    printf("%d\n", f(2,3,tab1,tab2));

    return 0;
}

