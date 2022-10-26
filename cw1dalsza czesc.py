#zad5
def zad5(a,b):
    if a>0 and b>0:
        return a/b
    return("nie zgadza się z ifem")

print(zad5(8,4))
print(zad5(8,0))

#zad7
def zad7(lista):
    return tuple(lista)

a = [12,15,2,34]
print(a)
print(zad7(a))

#zad8
def zad8():
    lista = []
    wartosc = "costam"
    while wartosc != "koniec":
        wartosc = input("podaj wartość, aby zakończyć podaj 'koniec'")
        if wartosc != "koniec":
            lista.append(wartosc)
    return tuple(lista)

print(zad8())