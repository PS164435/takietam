#include <stdio.h>
#include <stdlib.h>

/*
    Stw�rz typ wyliczeniowy Telewizor przechowuj�cy nazwy producent�w tv. Nast�pnie stw�rz program
    zawieraj�cy tablic� 5 element�w typu Telewizor. Wypisz na konsoli zawarto�� tablicy u�ywaj�c
    instrukcji warunkowej
*/

enum Telewizor
{
    Samsung,
    LG,
    Sony,
    Xiaomi,
    Panasonic
};

int main()
{
    enum Telewizor tab[5];
    tab[0] = Samsung;
    tab[1] = LG;
    tab[2] = Sony;
    tab[3] = Xiaomi;
    tab[4] = Panasonic;

    for(int i=0; i<5; i++){
        switch(tab[i]){
        case Samsung:
            printf("Samsung\n");
            break;
        case LG:
            printf("LG\n");
            break;
        case Sony:
            printf("Sony\n");
            break;
        case Xiaomi:
            printf("Xiaomi\n");
            break;
        case Panasonic:
            printf("Panasonic\n");
            break;
        }
    }
    return 0;
}
