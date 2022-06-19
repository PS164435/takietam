#include <stdio.h>
#include <stdlib.h>



int dlug(char* nap)
{
    int i = 0;
    while (nap[i]!=NULL)
    {
        i++;
    }
    return i;
}

int f(char * nap1, char * nap2 ,int n)
{
    if (dlug(nap1)!=dlug(nap2))
        return 0;
    if (nap1[n]<nap2[n])
        return 1;

    return 0;
}

int main()
{
    printf("%i",f("aabbc","aaaad",4));
    return 0;
}
