inicio = int(input("Digite o valor inicial: "))
contador = 0
for i in range(inicio, -1, -1):
    print(i)
    contador += 1
print("Quantidade:", contador)
