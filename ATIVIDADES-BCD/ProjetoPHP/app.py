import requests as rd

cep = input("Digite seu cep para continuar ")

url = f"https://viacep.com.br/ws/{cep}/json/"



dados_brutos = rd.get(url)

dados_refinados = dados_brutos.json()

print(f"Você mora na rua: {dados_refinados['logradouro']}, no bairro {dados_refinados['bairro']}, na cidade de {dados_refinados['localidade']}")