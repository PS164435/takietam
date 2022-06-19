#include <stdio.h>
#include <stdlib.h>


int silnia(unsigned int n)
{
    int silnia = 1;
    for (int i = 1; i<=n;i++)
    {
        silnia *= i;
    }
    return silnia;
}

float f(unsigned int n, float x)
{
    float suma = 0;
    for (int i = 0; i<=n;i++)
    {
        suma+=(pow(x,i))/(silnia(i));
    }
    return suma;
}


int main()
{

    printf("%d\n",silnia(12));
    printf("%f\n",f(2,7));
    return 0;
}

