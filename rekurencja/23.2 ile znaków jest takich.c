#include <stdio.h>
#include <stdlib.h>

int fun(char* nap)
{
    int suma = 0;
    int i = 0;
    while (nap[i]!=NULL)
    {
        if(nap[i]>=48 && nap[i]<=57)
        {
            suma ++;
        }
         if(nap[i]>=65 && nap[i]<=90)
        {
            suma ++;
        }
         if(nap[i]>=97 && nap[i]<=122)
        {
            suma ++;
        }
        i++;
    }

    return suma;
}

int main()
{

    printf("%d\n",fun("ka8G*#09-+LL.<"));
    return 0;
}
