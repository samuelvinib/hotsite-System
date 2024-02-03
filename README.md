# Teste Prático - Hotsite de Produto Imobiliário

>
>
> # Projeto Backend - Sistema de lead e hotsite
>
> ### Desenvolvimento de um hotsite para um produto imobiliário. O hotsite tem como objetivo apresentar informações sobre o produto e captar leads interessados no mesmo.
>
>
> ## Tecnologias utilizadas no projeto:
>  - `Front-end` : Blade (Laravel)
>  - `Back-end` : Laravel
>  - `Banco de dados` : Mysql
>  - `Infraestrutura/Contêineres` : Docker
>
>#

# Instalação do projeto

> - Este projeto foi construido em imagens Docker, é necessário ter o Docker instalado em sua máquina previamente.

## Passo 1

Após clonar o projeto em sua máquina navegue até o diretório raiz do projeto:

```bash
  cd crm_api
```

## Passo 2

Execute o seguinte comando para buildar o projeto:

```bash
  docker compose up -d --build
```

## Passo 3

Após o build acesse o container da Api:

   ```bash
  docker exec -it crm_api sh
  ```

## Passo 4

E agora realize as migrations para a criação de tabelas no banco de dados:

   ```bash
  php artisan migrate
  ```

<br>

## Pronto!

Seu projeto estará rodando no seguinte endereço:

```bash
  http://localhost:8000/
```

#

<br>

## Para utilizar acesse:

Link para o hotsite:
```bash
  http://localhost:8000/empreendimentos/condominio-verde-serrano
```
- Local onde pode visualizar o hotsite e enviar um formulário com seus dados.
<br>
<br>

Link para o painel administrativo:
```bash
  http://localhost:8000/
```
- Local onde se pode visualizar todos os leads recebidos do hotsite, deve se autenticar criando sua conta.
<br>

