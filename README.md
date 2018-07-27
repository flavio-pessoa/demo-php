## DEMO ##

### Descrição ###

DEMO é um sistema de controle de custos que auxilia a empresa a controlar questões como:
Cadastro de funcionarios e departamentos atuante

Cadastro de departamentos

Gerenciamento de movimentações


### Requisitos ###

O requisitos mínimos para rodar esse sistema é: 

- Servidor Apache na versão 2.4.23 com suporte ao PHP 7.0.10
- Banco de Dados Mysql na versão 5.7.14

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

### INSTALAÇÃO ###

##### Instalação a partir de um arquivo #####

Extraia o arquivo baixado do [yiiframework.com](http://www.yiiframework.com/download/) para um diretório `demo` diretamentamente para a raiz do servidor web.

Executar arquivo database.sql no servidor de banco de dados.

Você pode acessar o aplicativo através do seguinte URL:

~~~
http://{url_servidor}/demo/web/
~~~

## Changelog ##

1.0.0

 - Versão inicial do programa.


## Licença ##

Copyright 2018 FLAVIO LUIS.
