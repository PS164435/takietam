#include <stdio.h>
#include <stdlib.h>


void rek( int a)
{
    if(a==1)
        printf("%d\n", a);
    else if(a%2==0)
        rek(a-1);
    else if(a%2==1)
    {
        rek(a-2);
        printf("%d\n", a);
    }
}

int main()
{
    unsigned int n;
    printf("podaj n:");
    scanf("%d", &n);

    rek(n);

    return 0;
}
