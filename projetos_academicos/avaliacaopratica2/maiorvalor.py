n1 = int(input("Digite o primeiro valor: "))
n2 = int(input("Digite o segundo valor: "))
n3 = int(input("Digite o terceiro valor: "))

if n2> n1:
    n1 = n2
if n3 > n1:
    n1 = n3

print(f"O maior valor é: {n1}")