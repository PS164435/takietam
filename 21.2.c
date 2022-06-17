#include <stdio.h>
#include <stdlib.h>


int fun(float * f(float a), float x)
{
    for( int i = 1; i<=x; i++)
    {
      if (f(i) != f(-i))
        {
            return 0;
        }
        return 1;
    }
}

float aaa(float a)
{
    return pow(a,2);
}

float bbb(float b)
{
    return pow(b+1,2);
}

int main()
{

    printf("%i", fun(aaa,4.69));
    printf("%i", fun(bbb,4.69));

    return 0;
}
