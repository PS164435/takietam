#include <stdio.h>
#include <stdlib.h>




void fun(int * const a, int * const b)
{
    if (a>b)
        printf("%d > %d",a,b);
    else if (a<b)
        printf("%d < %d",a,b);
    else
        printf("%d = %d",a,b);
}

int main()
{
   int a = 13;
   int b = 70;
   fun(a,b);

    return 0;
}
