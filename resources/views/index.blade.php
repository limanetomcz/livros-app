<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Definindo a altura da div e a barra de rolagem */
        .scrollable-content {
            height: 400px; /* Defina a altura conforme necessário */
            overflow-y: scroll;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Sistema de Cadastro de Livros</h1>

        <div class="d-flex justify-content-center mb-4">
            <div class="btn-group-vertical">
                <a href="{{ route('assuntos.index') }}" class="btn btn-primary mb-2">Gerenciar Assuntos</a>
                <a href="{{ route('livros.index') }}" class="btn btn-primary mb-2">Gerenciar Livros</a>
                <a href="{{ route('autores.index') }}" class="btn btn-primary mb-2">Gerenciar Autores</a>
            </div>
        </div>

        <!-- Conteúdo com barra de rolagem -->
        <div class="scrollable-content">
            <h1>README</h1>

            <h2>Detalhes do projeto</h2>
            <p>O objetivo deste projeto é criar uma aplicação de cadastro de livros seguindo as boas práticas de mercado. O projeto envolve a criação de CRUDs para as entidades <strong>Livro</strong>, <strong>Autor</strong> e <strong>Assunto</strong>, além da geração de relatórios agrupados por autor, conforme o modelo de dados fornecido.</p>

            <p>O projeto foi desenvolvido utilizando as tecnologias web referentes à vaga.</p>

            <h2>Tecnologias Utilizadas</h2>
            <ul>
                <li><strong>Backend</strong>: <a href="https://laravel.com/">Laravel Sail 11</a></li>
                <li><strong>Banco de Dados</strong>: <strong>MySQL</strong></li>
                <li><strong>Relatórios</strong>: Relatórios gerados utilizando <a href="https://github.com/geekcom/phpjasper">PHPJasper</a></li>
                <li><strong>Frontend</strong>: <a href="https://getbootstrap.com/">Bootstrap</a> para o design da interface e formatação de componentes</li>
                <li><strong>Testes</strong>: Implementação de TDD</li>
            </ul>

            <h2>Instruções para Configuração do Projeto</h2>

            <h3>1. Requisitos do Sistema</h3>
            <ul>
                <li><strong>PHP 8.3 ou superior</strong></li>
                <li><strong>Composer</strong></li>
                <li><strong>MySQL</strong> como banco de dados</li>
                <li><strong>Java Runtime Environment (JRE)</strong> para geração de relatórios com PHPJasper</li>
            </ul>

            <h3>2. Instalação do Projeto</h3>
            <p>Siga os passos abaixo para configurar o projeto localmente:</p>
            <ol>
                <li><strong>Clone o repositório:</strong>
                    <pre><code>git clone &lt;link-do-repositorio&gt;
cd nome-do-repositorio</code></pre>
                </li>
                <li><strong>Instale as dependências do Composer:</strong>
                    <pre><code>composer install</code></pre>
                </li>
                <li><strong>Copie o arquivo .env:</strong>
                    <pre><code>cp .env.example .env</code></pre>
                </li>
                <li><strong>Configure as variáveis de ambiente no arquivo .env:</strong>
                    <pre>
                        <code>
                            DB_CONNECTION=mysql
                            DB_HOST=127.0.0.1
                            DB_PORT=3306
                            DB_DATABASE=livros_db
                            DB_USERNAME=root
                            DB_PASSWORD=secret
                        </code>
                    </pre>
                </li>
                <li><strong>Execute as migrações para criar as tabelas no banco de dados:</strong>
                    <pre><code>./vendor/bin/sail artisan migrate</code></pre>
                </li>
                <li><strong>Iniciar o servidor:</strong>
                    <pre><code>./vendor/bin/sail artisan serve</code></pre>
                </li>
            </ol>

            <h3>3. Instalação do Java</h3>
            <p>Este projeto utiliza <strong>PHPJasper</strong> para a geração de relatórios, o que requer a instalação do <strong>Java Runtime Environment (JRE)</strong>.</p>

            <h4>Para usuários de Linux (Ubuntu/Debian):</h4>
            <ol>
                <li>Entre no container do sail:
                    <pre><code>docker exec -it books-app-laravel.test-1 /bin/bash</code></pre>
                </li>
                <li>Remova versões antigas do Java:
                    <pre><code>apt-get remove --purge openjdk*</code></pre>
                </li>
                <li>Atualize os pacotes:
                    <pre><code>apt-get update</code></pre>
                </li>
                <li>Instale o OpenJDK 8:
                    <pre><code>apt-get install -y openjdk-8-jre</code></pre>
                </li>
            </ol>

            <h4>Para usuários de Windows:</h4>
            <ol>
                <li>Baixe o JRE do <a href="https://www.oracle.com/java/technologies/javase-jre8-downloads.html">site oficial do Oracle</a>.</li>
                <li>Siga as instruções do instalador.</li>
            </ol>

            <h4>Para usuários de MacOS:</h4>
            <pre><code>brew install --cask adoptopenjdk</code></pre>

            <p>Após instalar o Java, verifique a instalação:</p>
            <pre><code>java -version</code></pre>

            <h3>4. Geração de Relatórios</h3>
            <p>Este projeto inclui relatórios gerados a partir de uma <strong>view</strong> do banco de dados, agrupados por autor. Para gerar relatórios:</p>
            <ul>
                <li>Verifique se o Java está instalado conforme instruções anteriores.</li>
                <li>Novos relatórios deverão ser criados a partir do <strong>JasperStudio</strong> e compilados aqui no projeto utilizando 
                    a classe<strong> ReportController</strong>, através da rota /compile-relatorio.
            </ul>

            <h3>5. Testes</h3>
            <p>Este projeto não foi feito utilizando TDD por causa do pequeno espaço de tempo, porém alguns testes foram entregues. Verifique o diretório test do repositório.</p>
            <pre><code>./vendor/bin/sail artisan test</code></pre>

            <h2>Funcionalidades do Projeto</h2>
            <ul>
                <li><strong>CRUD</strong> de <strong>Livro</strong>, <strong>Autor</strong> e <strong>Assunto</strong></li>
                <li>Interface simples utilizando <strong>Bootstrap</strong> para formatação de componentes</li>
                <li>Relatório gerado e agrupado por <strong>Autor</strong>, com informações dos livros e assuntos relacionados</li>
                <li>Adição de campo <strong>Valor (R$)</strong> para o livro</li>
                <li><strong>Tratamento de Erros:</strong> Tratamentos específicos para possíveis erros de banco de dados e exceções, evitando o uso de try-catch genéricos</li>
            </ul>

            <h2>Modelo de Dados</h2>
            <p>O modelo de dados utilizado segue as especificações fornecidas, com a adição de um campo de <strong>Valor (R$)</strong> para a tabela <strong>Livro</strong>.</p>

            <h2>Apresentação</h2>
            <p>Este projeto foi criado apenas para o desafio técnico. Não recomendamos para uso comercial.</p>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>