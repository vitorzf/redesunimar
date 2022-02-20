import socket

target = '127.0.0.1'
port = 8000

client = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

client.connect((target, port))

texto = input("Digite o que deseja enviar\n")

if len(texto) == 0:
    exit
else:
    client.send(texto.encode())

    response = client.recv(4096)

    print(response)

exit
