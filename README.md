# Sistema de Prevenção a Cheias

O sistema de prevenção a cheias coleta dados de várias estações de monitoramento, utilizando diversos scripts agendados para rodar via crontab no servidor. Ele processa informações como o nível de água dos rios e as condições de chuva para gerar alertas e fornecer dados críticos sobre o risco de enchentes. O servidor de testes utiliza dados clonados do ambiente produtivo para permitir a análise de performance e testes de ajustes nos scripts sem impactar o ambiente de produção.

## Como executar a aplicação

Para iniciar os containers, execute o comando abaixo. Após isso, entre no container da aplicação para executar os seguintes passos:

```
make up
```

### Instalar dependências

Dentro do container, execute o comando abaixo para instalar as dependências do projeto:

```
make install
```

### Criar migrations

Dentro do container, execute o comando abaixo para criar as primeiras migrations do projeto:

```
make migrate
```

### Iniciar a aplicação

Dentro do container, execute o comando abaixo para iniciar a aplicação:

```
make start
```

## Variáveis de ambiente

Para consultar as variáveis de ambiente, acesse o arquivo abaixo: