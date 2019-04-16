## Desafio - Grupo Ceuma

## Problema
A Universidade CEUMA contratou uma empresa terceirizada para criar um sistema de gerenciamento dos alunos nos cursos que eles escolheram. Esta empresa começou a desenvolver o sistema, mas por falta de conhecimento técnico acabou desistindo do projeto. Você foi indicado para desenvolver o sistema com os mesmos requisitos solicitados pela Universidade, sendo que os usuários desse sistema são pessoas que possuem dificuldade em utilizar computadores e precisam que o mesmo proporcione uma experiência agradável.

## Requisitos Funcionais e Não Funcionais
- RF Cadastrar Aluno
- RF Remover Aluno
- RF Alterar Aluno
- RF Listar Aluno
- RF Cadastrar Curso
- RF Remover Curso
- RF Alterar Curso
- RF Listar Curso
- RF Listar os alunos que fazem parte de um curso
- RF O sistema deve exportar a lista de curso e alunos para o excel
- RF O sistema deve imprimir os dados dos cursos

- RNF O sistema deve utilizar a tecnologia REST para fazer o processamento de dados
- RNF Autenticação de usuário para consumo de webservices do sistema por sistemas externos
- RNF Uso de Design responsivo nas interfaces gráficas


## Tecnologias utilizada no projeto

- Composer v1.8.4
- Framework Laravel v5.8
- Framework Bootstrap 4
- MySQL
- Git

## Para Utilização

- Para utilização da aplicação é necessário a instalação do Composer para instalação de componentes, após a clonagem do repositório, execute o comendo "composer install" dentro da pasta do repositório, renomeie o arquivo ".env.exemple" para apenas ".env" e execute o comando "php artisan key:generate" para seu laravel funcionar perfeitamente. Configurações relacionadas ao banco de dados podem ser encontradas no aquivo .env e podem ser alteradas de acordo com a necessidade do usuário.
