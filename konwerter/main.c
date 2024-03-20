#include <stdio.h>
#include <stdlib.h>
#include <math.h>

int main()
{
    int liczba;
    int pozycja;
    char kierunek;

    printf("Podaj liczbe: ");
    scanf("%d", &liczba);

    printf("Podaj pozycje: ");
    scanf("%d", &pozycja);

    printf("Podaj kierunek: ");
    scanf("%c", &kierunek);

    int binary[32];

    int i = 0;
    while(liczba > 0) {
        binary[i] = liczba % 2;
        liczba = liczba / 2;
        i++;
    }

    if(pozycja > i){
        printf("Nie ma takiej pozycji");
        printf("\n");
    } else {
        printf("%d", binary[i-pozycja-1]);
        printf("\n");
    }


    for (int j = i - 1; j>= 0; j--){
        printf("%d", binary[j]);
    }

    int second_bit;
    if(kierunek == "P"){
        if(i-1-pozycja-2 >= 0 && i-1-pozycja-2 < i){
            second_bit = (int)binary[i-1-pozycja-2];
            binary[i-1-pozycja-2] = binary[i-1-pozycja];
            binary[i-1-pozycja] = second_bit;
        }
    } else if(kierunek == "L"){
        if(i-1-pozycja+2 >= 0 && i-1-pozycja+2 < i){
            second_bit = (int)binary[i-1-pozycja+2];
            binary[i-1-pozycja+2] = binary[i-1-pozycja];
            binary[i-1-pozycja] = second_bit;
        }
    }

    printf("\n");
    for (int j = i - 1; j>= 0; j--){
        printf("%d", binary[j]);
    }


    return 0;
}
