#include <stdio.h>
#include <stdlib.h>

unsigned int NWD(unsigned int n, unsigned int m)
{
    if (n==m)
    return n;
    if (n>m)
        return NWD(n-m,m);
    else
        return NWD(m-n,n);
}

int main()
{
    printf("%d",NWD(6,8));
    return 0;
}
