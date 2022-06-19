#include <stdio.h>
#include <stdlib.h>


int fun(float * f(float a), float x)
{

    for (int i =1; i<=x;i++)
    {
        if(f(i)!=f(-i))
            return 0;
    }
    return 1;
}

int fk1(float a)
{
    return a*a;
}

int fk2(float a)
{
    return (a+3);
}

int main()
{

    printf("%d\n",fun(fk1,7));
    printf("%d\n",fun(fk2,7));

    return 0;
}
