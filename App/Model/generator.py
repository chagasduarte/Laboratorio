# gerador de modelo em python

modelo = 'Produto'
variaveis = ['id', 'nome', 'imagem', 'descricao', 'tipo', 'preco', 'tamanho', 'disponivel']

print('<?php')
print()
print('\tclass {} {{'.format(modelo));

for v in variaveis:
	print('\t\tprivate ${};'.format(v))

print()
print('\t\tfunction __construct(', end='');

for i in range(len(variaveis)):
	if (i == 0):
		print('${}'.format(variaveis[i]), end='')
	else:
		print(', ${}'.format(variaveis[i]), end='')

print('){');

for v in variaveis:
	print('\t\t\t$this->{} = ${};'.format(v, v))

print('\t\t}');

print()

for v in variaveis:
	print('\t\tpublic function get{}(){{'.format(v.capitalize()))
	print('\t\t\treturn $this->{};'.format(v))
	print('\t\t}')
	print()
	print('\t\tpublic function set{}(){{'.format(v.capitalize()))
	print('\t\t\t$this->{} = ${};'.format(v, v))
	print('\t\t}')
	print()

print('\t}')
print()
print('?>')