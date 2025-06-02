#Elaborar uma função que calcule qual o consumo em km/litros de um carro

def consumo(k, l):
    consumo = k/l
    return round(consumo,2)


if __name__ == '__main__':

    kilometragem = float(input("Digite quantos  kilometros você andou: "))
    litros = float(input("Quantos litros vc consumiu: "))
    resultado = consumo(kilometragem, litros)
    print(f'Seu consumo é: {resultado}')
