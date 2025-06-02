def soma(n1,n2):
    return n1 + n2
def sub(n1,n2):
    return n1 - n2
def div(n1,n2):
    return n1/n2
def mult(n1,n2):
    return n1*n2

if __name__ == '__main__':
    num1 = float(input("Digite um numero: "))
    op = str(input("Digite o operador [+,-,/,*]"))
    num2 = float(input("Digite outro numero: "))


    if op == '+':
        print(f'{num1}+{num2} = {soma(num1,num2)}')
    elif op == '-':
        print(f'{num1}-{num2} = {sub(num1, num2)}')
    elif op == '*':
        print(f'{num1}x{num2} = {mult(num1, num2)}')
    else:
        print(f'{num1}/{num2} = {div(num1, num2)}')