a = int(input("Digite o comprimento do lado A: "))
b = int(input("Digite o comprimento do lado B: "))
c = int(input("Digite o comprimento do lado C: "))

if a==b and a==c:
    print("Seu triangulo é equilátero")

elif a+b<=c or a+c<=b or b+c<=a:
    print("Não se forma um triangulo")

elif a==b and a!=c or a==c and a!=b or b==c and b!=a:
    print("Seu triangulo é isoceles")

else:
    print("Seu triangulo é escaleno")


