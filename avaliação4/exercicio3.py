soma = 0
contador = 0
for i in range(1, 11):
    dobro = i * 2
    print(dobro)
    soma += dobro
    contador += 1
media = soma / contador
print("Soma:", soma)
print("Média:", media)
