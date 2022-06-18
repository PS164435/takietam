#include <stdio.h>
#include <stdlib.h>

unsigned int NWW(unsigned int n, unsigned int m, unsigned int a, unsigned int b)
{
    if (n==m)
    return n;
    if (n>m)
        return NWW(n,m+b,a,b);
    if (n<m)
       return NWW(n+a,m,a,b);
}

int main()
{
    printf("%d",NWW(6,8,6,8));

    return 0;
}
