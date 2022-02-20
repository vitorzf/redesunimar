import socket
import threading

bind_ip = '127.0.0.1'
bind_port = 8000

server = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
server.bind((bind_ip, bind_port))

print('Escutando IP e Porta: {}:{}'.format(bind_ip, bind_port))

while True:

    bytesAddressPair = server.recvfrom(1024)
    request = bytesAddressPair[0].decode('UTF-8')
    client_address = bytesAddressPair[1]
    print('Conexão recebida de {}'.format(client_address))
    print('Recebido: {}'.format(request))
