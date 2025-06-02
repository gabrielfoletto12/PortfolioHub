valores = []

while True:
    entrada = input("Digite um valor (ou 'sair' para finalizar): ")
    if entrada.lower() == 'sair':
        break
    try:
        numero = float(entrada)
        valores.append(numero)
    except ValueError:
        print("Valor inválido. Tente novamente.")

quantidade = len(valores)
soma = sum(valores)
media = soma / quantidade if quantidade > 0 else 0
maiores_que_vinte = sum(1 for x in valores if x > 20)

print(f"Quantidade de valores: {quantidade}")
print(f"Soma dos valores: {soma:.2f}")
print(f"Média dos valores: {media:.2f}")
print(f"Valores maiores que 20: {maiores_que_vinte}")
