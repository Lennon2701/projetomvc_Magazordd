## Instalação
Você pode clonar este repositório OU baixar o .zip

Ao descompactar, é necessário rodar o **composer** pra instalar as dependências e gerar o *autoload*.

Vá até a pasta do projeto, pelo *prompt/terminal* e execute:
> composer install

Após instalar o composer, baixe o PHPUnit
> composer require --dev phpunit/phpunit

Depois é só aguardar.

## Configuração
Todos os arquivos de **configuração** e aplicação estão dentro da pasta *src*.

As configurações de Banco de Dados e URL estão no arquivo *src/Config.php*

É importante configurar corretamente a constante *BASE_DIR*:
> const BASE_DIR = '/**PastaDoProjeto**/public';

## Uso
Você deve acessar a pasta *public* do projeto.

O ideal é criar um ***alias*** específico no servidor que direcione diretamente para a pasta *public*.

***Alguns logins de acesso são:***

***('Marcelo', 'marcelo@hotmail.com', 2345),***
***('Fernanda', 'fernanda@hotmail.com', 1212),***
***('Cleber', 'cleber@hotmail.com', 3987),***
***('Roberto', 'roberto@hotmail.com', 5555),***
***('João', 'joao@hotmail.com', 4572);***

## Modelo de MODEL
```php
<?php
namespace src\models;
use \core\Model;

class Reservation extends Model {

}
```
