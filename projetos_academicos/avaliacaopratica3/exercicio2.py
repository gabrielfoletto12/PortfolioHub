notas = []

while True:
    entrada = input("Digite a nota do aluno (ou 'sair' para finalizar): ")
    if entrada.lower() == 'sair':
        break
    try:
        nota = float(entrada)
        if 0 <= nota <= 10:
            notas.append(nota)
        else:
            print("Nota inválida. Digite um valor entre 0 e 10.")
    except ValueError:
        print("Entrada inválida. Tente novamente.")

quantidade_alunos = len(notas)
aprovados = sum(1 for nota in notas if nota >= 5)
reprovados = quantidade_alunos - aprovados

print(f"Quantidade de alunos que fizeram a prova: {quantidade_alunos}")
print(f"Quantidade de alunos aprovados: {aprovados}")
print(f"Quantidade de alunos reprovados: {reprovados}")