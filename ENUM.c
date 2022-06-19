#include <stdio.h>
#include <stdlib.h>

/*
    Stwórz typ wyliczeniowy Telewizor przechowuj¹cy nazwy producentów tv. Nastêpnie stwórz program
    zawieraj¹cy tablicê 5 elementów typu Telewizor. Wypisz na konsoli zawartoœæ tablicy u¿ywaj¹c
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
