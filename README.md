# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run
```bash
composer create-project --prefer-dist cakephp/app [app_name]
```

You should now be able to visit the path to where you installed the app and see
the setup traffic lights.

## Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your application. The actual schema is 'gerenciadortarefas'.

Apply the scripts:

CREATE TABLE tarefas (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
assunto VARCHAR(100) NOT NULL,
descricao VARCHAR(300) NOT NULL
);

insert into tarefas (assunto, descricao) values ('Médico','Médico Sexta dia 19 na rua governador celso ramos, 41');

Run file index.html from root

## Comments

Desenvolvimento feito pela metade pois tive problema com cross-origin no CakePhp.
Implementado toda a parte do Rest.
Implementada toda a parte de listagem de tarefas ordenando por ID.
Implementada busca por tarefas.
Implementada opção para adicionar tarefas (não está atualizando após dar o POST pelo problema do cross-origin, se atualizar navegador a listagem é atualizada)
Opção de remover tarefa implementada mas com erro de cross-origin.
Implementado layout responsivo (PC/Mobile)
Não implementado drag and drop e edição da tarefa (PUT implementado no REST, faltou front-end)
