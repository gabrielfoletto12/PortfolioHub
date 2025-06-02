def posi_nulo_nega(n1):
    if n1 > 0:
        print('positivo')
    elif n1 < 0:
        print('negativo')
    else:
        print('nulo')

if __name__ == '__main__':
    num = float(input('Digite um numero: '))
    posi_nulo_nega(num)
