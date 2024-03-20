#include <stdio.h>
#include <stdlib.h>
#define BIT_VALUE(val,noBit) (val>>noBit) & 1

int seed = 1;
int xor = 0;
int ilerazy = 100;

int main()
{

    for(int i=1;i<ilerazy;i++){

    xor = BIT_VALUE(seed,0) ^ BIT_VALUE(seed,1) ^ BIT_VALUE(seed,4) ^ BIT_VALUE(seed,5);

   // printf("\n%d ",xor);

    seed = seed >> 1;
    seed += xor << 5;

    printf("\nliczba to: %d ",seed);
    }


    return 0;

}
