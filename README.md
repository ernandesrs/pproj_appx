# APPX

APPX é uma aplicação criada para estudos em desenvolvimento de aplicações com Talwind CSS, Alpine JS, Livewire e Laravel.

### PRINTSCREEN DA HOME
![home-with-chart](https://github.com/user-attachments/assets/158ce920-674e-4748-aeb8-817411c18159)

### PRINTSCREEN DA LISTA DE USUÁRIOS
![users](https://github.com/user-attachments/assets/312a33c8-f2a6-40ff-9e01-5f2d9c83e3c6)

# RECURSOS IMPLEMENTADOS

    - Camada de autenticação: login;
    - Camada administrativa: gerenciamento de usuários, cargos e permissões.

# REQUISITOS

    - PHP 8.3 ou superior;
    - Node JS v22.12.0 ou superior;
    - Composer 2.8.4 ou superior;

# INSTALAÇÃO

    - Instalação padrão de uma aplicação Laravel/Livewire;
    - É uma boa executar o comando para gerar o link simbólico para o **storage**;

Você pode querer popular o banco de dados com dados básicos para testes, para isso execute o comando:
    - php artisan db:seed

Isso irá criar cargos, permissões padrão, um super usuário, um administrador e mais 100 usuários aleatórios.

# DESENVOLVIMENTO

Diversos componentes Blade foram criados para facilitar o desenvolvimento, desde simples botões, até tabelas e páginas. Para facilitar, foram criados **stubs** personalizados para gerar classes e views já previamente construídas, para isso pode-se utilizar os comandos abaixo.

# PARA A CAMADA ADMINISTRATIVA

### Página básica para a camada administrativa

O comando abaixo irá gerar uma classe e view de componente Livewire customizada, utilizando algumas traits e pré-implementando alguns recursos, abra a classe e faças as alterações necessárias, elas são bem intuitivas:

    - php artisan make:livewire \Admin\ComponentName --stub=admin

### Página de listagem para a camada administrativa

O comando abaixo irá fazer praticamente a mesma coisa do comando acima, porém está irá gerar uma classe e view específica para listagem. A classe irá utilizar traits para filtragem e alguns outros recursos e, a view irá utilizar alguns componentes específicos para a a listagem.

    - php artisan make:livewire \Admin\ComponentName --stub=admin/list
