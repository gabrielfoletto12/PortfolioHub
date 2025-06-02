pares = []
impares = []

while True:
    entrada = input("Digite um número (ou '0' para finalizar): ")
    try:
        numero = int(entrada)
        if numero == 0:
            break
        if numero % 2 == 0:
            pares.append(numero)
        else:
            impares.append(numero)
    except ValueError:
        print("Entrada inválida. Digite um número inteiro.")

media_pares = sum(pares) / len(pares) if pares else 0
media_impares = sum(impares) / len(impares) if impares else 0

print(f"Média dos números pares: {media_pares:.2f}")
print(f"Média dos números ímpares: {media_impares:.2f}")