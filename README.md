# ecommerce-website
Projeto acadêmico do 4º Periodo de Sistemas de informação 2018 - Uniguaçu
Criado pelos alunos
- Antonio Augusto Maguelniski
- Ewerton Henrique Marschalk
- Lucas Angeli
- Lucas Camargo

E-commerce com PHP e PostgreSQL





Configurações necessárias para funcionar:

[Dependencias]
- PHP@^7
- PostgreSQL@^10
- Node.JS@^8.12.0
- npm@^1.0 (Rodar um 'npm install' na pasta do projeto após clonar para instalar as dependencias:
	- jquery@1.9.3
	- popper.js@^1.14.3
	- bootstrap@4.1.3
	- Sass@^1.0
)

Para fazer modificações no CSS, rodar:
'sass --watch node_modules/bootstrap/scss:node_modules/bootstrap/compiler'
e alterar no codigo fonte (node_modules/bootstrap/scss/style.scss)
o sass irá verificar qualquer alteração e recompilar o css.


[PHP]
- descomentar as extenções:
	- extension=pdo_pgsql
	- extension=pgsql

[PostgreSQL]
- Configurar o usuario e senha e setar os mesmos no arquivo db_connect.php 
- Criar o banco usando o arquivo db.sql