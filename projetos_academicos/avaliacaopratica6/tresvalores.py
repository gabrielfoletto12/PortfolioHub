def soma(a,b,c):
    return a+b+c

if __name__ == '__main__':

    v1 = int(input("Digite o valor 1: "))
    v2 = int(input("Digite o valor 2: "))
    v3 = int(input("Digite o valor 3: "))

    resultado = soma(v1,v2,v3)
    print (f'A soma dos seus números é: {resultado}')