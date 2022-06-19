#include <stdio.h>
#include <stdlib.h>


void fun(int (* wsk)(int a ,int b),int n)
{
    printf("%p\n%d\n",wsk,n);
}

int funk(int a, int b)
{
    return a+b;
}

int main()
{

  fun(funk(1,4),17);

    return 0;
}
