#include <stdio.h>
#include <stdlib.h>

int f(unsigned int n)
{
    if(n==0)
        return 1;
    if(n==1)
        return 2;
    if(n==2)
        return -2;
    if(n%3==0)
        return 2*f(n/3);
    if(n%3==1)
        return f(n-1)-1;
    if(n%3==2)
        return f(n-1);
}

int main()
{
    printf("%d\n", f(8));
    return 0;
}
