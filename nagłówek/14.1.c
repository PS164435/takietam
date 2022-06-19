#include <stdio.h>
#include <stdlib.h>

void fun( int (* wsk)(int a, int b), int n)
{
   printf("%d + %d = %d\n",wsk,n,wsk + n);
}

int funk(int a, int b)
{
    return a*b;
}

int main()
{
   fun(funk(13,70),2);

    return 0;
}
