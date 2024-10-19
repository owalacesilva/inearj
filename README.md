# Sistema de Prevenção a Cheias

O sistema de prevenção a cheias coleta dados de várias estações de monitoramento, usando diversos scripts agendados para rodar via crontab no ervidor. Ele processa dados como o nível de água dos rios e as condições de chuva para gerar alertas e fornecer informações críticas sobre o risco de enchentes.
O servidor de testes utiliza dados clonados do ambiente produtivo para permitir a análise de performance e testes de ajustes nos scripts sem impactar o ambiente de produção.

## Como executar a aplicação

```
docker compose up
```
**Note:** Para iniciar os containers, execute o comando abaixo. Após isso, entre o container da aplicação para executar os seguintes passos.

Execute o comando abaixo para instalar as dependecias do projeto.
```
make install
```

Execute o comando abaixo para criar as primeiras migrations do projeto.
```
make migrate
```

Execute o comando abaixo para iniciar a aplicação.
```
make start
```