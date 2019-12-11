## Numbers Challenge

### Requisitos/dependências para rodar o projeto:

* PHP >= 7.2.0
* BCMath PHP Extension
* Ctype PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Composer (https://getcomposer.org/download/)
* git

## Rodando o projeto:

**1 - Clonar repo:**: git clone https://github.com/matheusbattisti/numbers_challenge.git

**2 - Ir para o dir do projeto:** cd numbers_challenge

**3 - Instalar as dependências do composer:** composer install

**4 - Rodar o servidor:** php artisan serve --port=3000

**5 - Executar os testes na rota /:** curl localhost:8000/1

**Opicional: Executar testes unitários:** vendor/bin/phpunit

## Arquivos principais do projeto:

* O Controller com a lógica é o ChallengeController.php (app/Http/Controllers/);
* O arquivo das constantes utilizadas é o constants.php (app/config/)
* O arquivo com de helper com os métodos é o Helper.php (app/Helpers/)
* O arquivo de testes unitários é o ChallengeTest.php (tests/Feature/)
