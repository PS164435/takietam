#include <stdio.h>
#include <stdlib.h>

#include <stdio.h>
#include <stdlib.h>

void rek (int n)
{
    if (n==2)
        printf("%d\n",n);
    else if (n%2==1)
        rek(n-1);
    else if (n%2==0)
    {
        rek(n-2);
        printf("%d\n",n);
    }
}

int main()
{

    unsigned int n;
    printf("podaj n:");
    scanf("%d",&n);
    rek(n);

    return 0;
}
