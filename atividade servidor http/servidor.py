import socket
import threading
from urllib.parse import urlparse

bind_ip = '127.0.0.1'
bind_port = 8002

http_response = """
HTTP/1.1 200 Ok
Content-Type: text/html
Content-Length: {size}

{body}
"""

server = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
#Por algum motivo tive que comentar a linha de reutilizar a porta por conta do meu python não estar aceitando, caso ocorra o mesmo so comentar a linha abaixo
server.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEPORT, 1)

server.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)

server.bind((bind_ip, bind_port))
server.listen(5)

print('Servidor iniciado no IP e Porta: {}:{}'.format(bind_ip, bind_port))

def handle_client_connection(client_socket):
    request = client_socket.recv(4096).decode()
    client_socket.send(http_response.format(size=len(request), body=request).encode())
    client_socket.close()

while True:
    client_sock, address = server.accept()
    print('Conexão recebida de {}:{}'.format(address[0], address[1]))
    client_handler = threading.Thread(
        target=handle_client_connection,
        args=(client_sock,)
    )
    client_handler.start()
