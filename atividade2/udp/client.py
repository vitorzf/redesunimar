import socket, time

target = '127.0.0.1'
port = 8000

#UDP
client = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)

texto = input("Digite o que deseja enviar\n")

if len(texto) == 0:
    exit
else:

    # client.sendto(texto.encode(), (target, port))
    client.sendto(str.encode(texto), (target,port))

    print("Mensagem enviada")

exit
