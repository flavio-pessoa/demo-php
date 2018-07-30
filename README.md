
## DEMO ##

### Descrição ###

DEMO é um sistema de controle de custos que auxilia a empresa a controlar questões como:

- **Cadastro de funcionarios e departamentos atuante**  
O usuario tem o poder para cadastrar novos funcionarios e em quais departamentos este funcionario ira trabalhar

- **Cadastro de departamentos**  
O usuario tem o poder para cadastrar os departamentos da empresa

- **Gerenciamento de movimentações**  
O usuario tem o poder de definir as movimentações de cada departamento, ou seja, seus custos

### Requisitos ###

O requisitos mínimos para rodar esse sistema é: 

- Servidor Apache na versão 2.4.23 com suporte ao PHP 7.0.10
- Banco de Dados Mysql na versão 5.7.14
- Composer na versão 1.6.5  

As seguintes extensões devem estar carregadas no PHP:

- Reflection extension
- PCRE extension
- SPL extension
- Ctype extension
- MBString extension
- OpenSSL extension
- Intl extension
- Fileinfo extension
- DOM extension
- PDO extension
- PDO MySQL extension
- Memcache extension
- GD PHP extension with FreeType support
- ImageMagick PHP extension with PNG support

Configuração expecifica no php.ini

- `expose_php` deve estar desativado
- `allow_url_include` deve estar desativado

Versão do biblioteca da extensão intl:

- ICU versão 49.0 ou superior
- ICU Data versão 49.1 ou superior

### Tecnologias ###
Foi utilizado no desenvolvimento do sistema:

- PHP
- [Yii PHP Framework](https://www.yiiframework.com)

### Instalação ###

##### Instalação a partir de um arquivo #####

- Clone o esse repositorio do [github.com](https://github.com/flavio-pessoa/demo) para um na raiz do servidor web.
- Execute os arquivos de extensão .sql contidos na pasta db-files no servidor de banco de dados.
- Rodar o comando `composer update`


Você pode acessar o aplicativo através do seguinte URL:

~~~
http://{url_servidor}/demo-php/
~~~

##### Acessar API #####

Você pode acessar a API do aplicativo através das seguintes endereços:

~~~
http://{url_servidor}/demo-php/web/api/funcionario/
~~~
~~~
http://{url_servidor}/demo-php/web/api/departamento/
~~~

No campo usuario, informar token do funcionario que esta tentanto acessar a API.

- Usuario: `admin`
- Token: `m_EX9P2rGiy7hZUHwyFAtgwrBxCJTI7R`


## Changelog ##

1.0.0

 - Versão inicial do programa.


## Licença ##

Copyright 2018 FLAVIO LUIS.