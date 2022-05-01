//Importa o MQTT
var mqtt = require('mqtt');

//Readline pra poder ler o que for digitado
const readline = require('readline');

//Conexão com o mosquitto no ambiente de teste
var client = mqtt.connect('mqtt://test.mosquitto.org:1883');

//Instancia o readline
const rl = readline.createInterface({
    input:process.stdin,
    output:process.stdout
});

var nome = '';

//função que será executada ao conectar com o qtt
client.on('connect', () => {
    
    rl.question('Digite o seu nome:', (resposta) => {

        nome = resposta;

        if(nome.trim().length == 0){
            nome = "Anônimo";
        }

        //da subscribe em chat-unimar
        client.subscribe('chat-unimar');

        //envia a mensagem dizendo que o usuario se conectou para os outros usuarios que ja estao no chat
        client.publish('chat-unimar', `${nome} se conectou ao Chat!`);

        rl.on('line', (input) => {
            //Para cada nova linha envia a mensagem se nao estiver vazia
            if(input.trim().length > 0){
                client.publish('chat-unimar', `${nome}: ${input}`);
            }

            //Linha adicional para limpar a entrada do usuario e deixar somente o chat
            readline.moveCursor(process.stdout,0,-1);
            readline.clearScreenDown(process.stdout);
        });

    });

});

client.on('close', () => {
    //Caso a conexao seja fechada
    console.log('Você saiu do chat!');
});

client.on('message', (topic, message) => {
    console.log(message.toString());
});