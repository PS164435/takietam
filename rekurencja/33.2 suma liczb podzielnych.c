#include <stdio.h>
#include <stdlib.h>

int f(unsigned int n)
{
    int suma = 0;
    for (int i = 0; i<n;i++)
    {
        if(i%5==0)
            suma+=i;
        else if (i%7==0)
            suma+=i;
    }
    return suma;
}

int main()
{
    printf("%d",f(15));
    return 0;
}
