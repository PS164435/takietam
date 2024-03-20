#include <stdio.h>
#include <stdlib.h>
#define BIT_VALUE(val,noBit) (val>>noBit) & 1

unsigned int counter = 0;

void delay()
{
    for(int a=0;a<=147483647;a++)
    {
        for(int b=0;a<=512;b++)
        {

        }
    }
}

int main(void)
{

    int IntToGray(unsigned char input)
    {
        return (input >> 1) ^ input;
    }

    while(1)
    {
        printf("\r");
        for(int i=7;i>=0;i--)
        {
            printf("%d",BIT_VALUE(counter,i));
        }
        printf(" ");
        for(int i=7;i>=0;i--)
        {
            printf("%d",BIT_VALUE(IntToGray(counter),i));
        }

        counter++;
        delay();
    }
}
