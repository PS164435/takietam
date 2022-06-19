#include <stdio.h>
#include <stdlib.h>


int * foo(char * napis1,char *  napis2)
{
    int i = 0;
    int j = 0;
    while (napis1[i]!=NULL)
    {
        i++;
    }
    while (napis2[j]!=NULL)
    {
        j++;
    }
    int s = i+j;
    return s;
}

int main()
{
    char*napis1 = "kotek";
    char*napis2 = "kowadlo";

    printf("%p",foo(napis1,napis2));

    return 0;
}
