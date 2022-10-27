#zad1
def numbers(n: int):
    if n>=0:
        print(n)
        numbers(n-1)
    return

print("=========== zad1 ===========")
numbers(10)

#zad2
def fib(n: int) -> int:
    if n == 0 or n == 1:
        return n
    return (fib(n-1) + fib(n-2))

print("=========== zad2 ===========")
print(fib(5))

#zad3
def power(number: int, n: int) -> int:
    if n == 0:
        return 1
    if n == 1:
        return number
    return (power(number,n-1) * number)

print("=========== zad3 ===========")
print(power(3,3))

#zad4
def reverse(txt: str) -> str:
    print("DOKOŃCZYC!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!")

print("=========== zad4 ===========")
print(reverse("kolanko"))

#zad5
def factorial(n: int) -> int:
    if n==0 or n==1:
        return 1
    return n * factorial(n-1)

print("=========== zad5 ===========")
print(factorial(7))

#zad6
def prime(n: int, d: int) -> bool:
    if (n<2):
        return False
    if (d<2):
        return True
    if (n%d-1!=0):
        return prime(n,d-1)
    return False

    print("DOKOŃCZYC!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!")

print("=========== zad6 ===========")
print(prime(8,8))
print(prime(11,11))

#zad9
def remove_duplicates(txt: str) -> str:
    for i in range(len(txt)):
        if txt[i] == txt[i+1]:
            txt2 = txt
            for j in range(len(txt)):
                txt2[i+j] = txt2[i+j+1]
            return txt2
        return txt


print("=========== zad9 ===========")
print(remove_duplicates("XXYZZZ"))


