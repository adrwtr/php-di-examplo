# php-di-examplo
Exemplo e aplicação simples em PHP com Dependence Injection para testes

# Passo a passo

1 - Criação do projeto no gitlab

2 - Baixar o projeto na maquina

git clone https://github.com/adrwtr/php-di-examplo.git

3 - Instalando composer no projeto para baixar pacotes de terceiros

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

4 - adicionando no gitignore o composer

