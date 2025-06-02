n1 = int(input("Digite o primeiro valor: "))
op = input("Digite o operador (+, -, *, /): ")
n2 = int(input("Digite o segundo valor: "))

if op == "+":
    print(n1+n2)

elif op == "-":
    print(n1-n2)

elif op == "*":
    print(n1 * n2)

else:
    print(n1 /n2)