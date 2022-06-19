#include <stdio.h>
#include <stdlib.h>

/* Napisz bezargumentow¹ funkcjê, która rezerwuje blok czterech zmiennych typu float. Funkcja ma
ustawiæ kolejno w pamiêci wartoœci 5.2, 1.3, -3.9 i -4.2. Na koniec funkcja powinna zwróciæ wskaŸnik na
pocz¹tek bloku. Stwórz przypadek testowy w main tak, aby wyœwietliæ na konsoli wartoœci zmiennych
przechowywanych na bloku stworzonym wewn¹trz funkcji.
*/

float* rezerwacja()
{
    float* x = malloc(sizeof(float)*4);
    x[0] = 5.2;
    x[1] = 1.3;
    x[2] = -3.9;
    x[3] = -4.2;
    return x;
}

int main()
{
    float* tab = rezerwacja();
    printf("%f, %f, %f, %f\n", tab[0], tab[1], tab[2], tab[3]);
    return 0;
}
