import socket, time

target = '127.0.0.1'
port = 8000

#TCP
client = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

client.connect((target, port))

texto = input("Digite o que deseja enviar\n")

if len(texto) == 0:
    exit
else:
    client.send(texto.encode())

    response = client.recv(4096)

    print("Resposta TCP: {}\n".format(response))

exit
