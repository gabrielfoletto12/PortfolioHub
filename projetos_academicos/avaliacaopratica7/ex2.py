def valorabsoluto(n1):
    if n1 > 0 or n1 == 0:
        return n1
    else:
        return -1*n1

if __name__ == '__main__':
    num = float(input('Digite um numero: '))
    print(f'O valor absoluto(modulo) é: {valorabsoluto(num)}')
