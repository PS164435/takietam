#include <stdio.h>
#include <stdlib.h>


void fun(int (* wsk)(float a, float b) ,int n)
{
    printf("podano %d i %d",wsk,n);
}

int funk(float a, float b)
{
    return floor(a-b);
}


int main()
{
   fun(funk(14.50,10.15),8);

    return 0;
}
