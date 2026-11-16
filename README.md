# XRAIL — Sistema de Gerenciamento e Monitoramento Ferroviário

sa-ferrovia

## Resumo
O XRAIL é um sistema web desenvolvido para auxiliar no gerenciamento e monitoramento
de informações relacionadas a uma operação ferroviária. A aplicação centraliza dados de
usuários, trens, sensores e rotas, proporcionando uma interface organizada para o
acompanhamento das informações.

O sistema foi desenvolvido como parte de uma Situação de Aprendizagem, com o objetivo
de aplicar conhecimentos de desenvolvimento web, programação, banco de dados e
integração de serviços externos.

A aplicação possui diferentes níveis de acesso, permitindo que administradores realizem
operações de gerenciamento, enquanto usuários comuns possuem acesso às
funcionalidades de consulta e monitoramento.

Além disso, o XRAIL conta com integrações de APIs externas para consulta automática de
endereços por CEP e informações climáticas, ampliando os recursos disponíveis na
aplicação.

## Proposta
A principal proposta do projeto é centralizar e organizar as informações relacionadas à
operação ferroviária, facilitando o gerenciamento de trens, sensores, rotas e usuários em um
único ambiente.

O sistema permite cadastrar, consultar, editar e excluir registros, estabelecendo
relacionamentos entre as entidades por meio de um banco de dados relacional.

A aplicação também disponibiliza diferentes níveis de acesso. O administrador possui
permissões para gerenciar os cadastros e acessar as funcionalidades administrativas,
enquanto o usuário comum pode consultar rotas e acompanhar informações dos sensores.

O desenvolvimento busca aplicar boas práticas de programação, organização de código,
integração de APIs e conceitos de metodologias ágeis, principalmente Scrum e Kanban.

## O Sistema contém:
- Login de usuários por e-mail e senha;
- Controle de acesso por diferentes níveis de permissão;
- Cadastro de usuários;
- Consulta de usuários cadastrados;
- Edição de informações dos usuários;
- Exclusão de usuários;
- Consulta automática de CEP;
- Cadastro de trens;
- Consulta e visualização de trens;
- Edição de informações dos trens;
- Exclusão de trens;
- Cadastro de sensores;
- Associação de sensores aos trens;
- Consulta de sensores;
- Edição de sensores;
- Exclusão de sensores;
- Cadastro e gerenciamento de rotas;
- Consulta de rotas;
- Visualização de informações dos sensores por identificador;
- Painel administrativo;
- Painel do usuário;
- Consulta de informações climáticas;
- Armazenamento das informações em banco de dados MySQL.

## Estrutura do Diretório

```text
  sa-ferrovia/

|
├── .vscode/
│   └── settings.json
|
|
├── assets/
│   └── images/
│       ├── Fundo_tela.png
│       ├── Simbolo.png
│       ├── grafico_1.png
│       ├── monitoramento_1.png
│       ├── tela.png
│       ├── trem.png
│       ├── trem1.png
│       └── usuário.png
│
├── database/
│   └── db.sql
│
├── documentos/
│   ├── pesquisa_apis.md
│   ├── pesquisa_crud.md
│   ├── pesquisa_identidade_visual.md
│   ├── pesquisa_PDO.md
│   ├── pesquisa_scrum.md
│   ├── pesquisa_xampp.md
│   └── relatorio_IA.md
│
├── infra/
│   ├── clima.php
│   └── conexao.php
│
├── public/
│   │
│   ├── Administrador/
│   │   │
│   │   ├── home_page/
│   │   │     │
│   │   │     ├── rotas/
│   │   │     │   ├── adicionar_rota.php

│   │   │   │   ├── atualizar_rotas.php
│   │   │   │   ├── cadastro_rotas.php
│   │   │   │   ├── editar_rota.php
│   │   │   │   ├── excluir_rota.php
│   │   │   │   └── rotas.php
│   │   │   │
│   │   │   ├── sensor/
│   │   │   │   ├── cadastro_sensor.php
│   │   │   │   ├── delete_sensor.php
│   │   │   │   └── editar_sensor.php
│   │   │   │
│   │   │   ├── trem/
│   │   │   │   ├── cadastro_trem.php
│   │   │   │   ├── delete_trem.php
│   │   │   │   ├── editar_trem.php
│   │   │   │   └── visualizar_trem.php
│   │   │   │
│   │   │   └── adm_home.php
│   │   │
│   │   ├── monitoramento_page/
│   │   │   ├── adm_monitoramento.php
│   │   │   └── adm_visualizar_sensor.php
│   │   │
│   │   └── usuario_page/
│   │       ├── adicionar_usuario.php
│   │       ├── atualizar_usuario.php
│   │       ├── buscar_usuario.php
│   │       ├── cadastrar_usuario.php
│   │       ├── consultar_cep.php
│   │       ├── editar_usuario.php
│   │       ├── excluir_usuario.php
│   │       ├── usuario.php
│   │       └── visualizar_usuario.php
│   │
│   └── Usuário/
│       │
│       ├── home_page/
│       │   └── usuario_home.php
│       │
│       ├── monitoramento_page/

  │         │    ├── usuario_monitoramento.php
  │         │    └── usuario_visualizar_sensor.php
  │         │
  │         └── rotas_usuario/
  │              └── rotas_usuario.php
  │
  ├── style/
  │    └── style.css
  │
  ├── index.php
  ├── LICENSE
  ├── logout.php
  └── README.md
```

### Organização dos diretórios
| Diretório/arquivo | Responsabilidade |
|---|---|
| assets/ | Armazenamento das imagens e recursos visuais do sistema. |
| database/ | Contém o script SQL responsável pela estruturação do banco de dados. |
| documentos/ | Reúne pesquisas técnicas e relatórios produzidos durante o desenvolvimento. |
| infra/ | Contém arquivos de infraestrutura, conexão com o banco e integração climática. |
| public/ | Armazena as páginas e funcionalidades acessíveis pelos usuários, separadas por perfil. |
| style/ | Contém os arquivos CSS responsáveis pela identidade visual e estilização. |
| index.php | Página inicial responsável pela autenticação. |
| logout.php | Responsável pelo encerramento da sessão. |
| README.md | Documentação geral do projeto. |
| LICENSE | Arquivo de licença do projeto. |

## Diagrama
O XRAIL possui uma organização dividida entre a interface, o processamento em PHP, a
infraestrutura e o banco de dados.

[![Architecture diagram of ketlynmelo/sa-ferrovia](https://gitdiagram.com/ketlynmelo/sa-ferrovia/diagram.png)](https://gitdiagram.com/ketlynmelo/sa-ferrovia?utm_source=readme&utm_medium=picture)

## Regras de Negócios

| ID | Descrição |
|---|---|
| RN01 | O sistema deve permitir acesso apenas a usuários previamente cadastrados. |
| RN02 | O login deve ser realizado com e-mail e senha válidos. |
| RN03 | Após autenticação válida, o usuário deve iniciar uma sessão. |
| RN04 | Sessões devem ser encerradas ao realizar logout. |
| RN05 | Cada sensor deve estar vinculado a um único trem. |
| RN06 | Um trem pode possuir vários sensores. |
| RN07 | Sensores devem possuir: nome, localização e tipo de dado monitorado. |
| RN08 | Tipos de dados monitorados incluem: velocidade, temperatura, falha e consumo de energia. |
| RN09 | Sensores não podem ser excluídos se possuírem dados registrados. |
| RN10 | Antes da exclusão, o sistema deve solicitar confirmação do usuário. |
| RN11 | Os dados recebidos dos sensores devem ser armazenados no banco de dados. |
| RN12 | O sistema deve exibir os dados em tempo real (ou o mais próximo possível). |
| RN13 | O status operacional deve ser classificado como: normal, alerta ou falha. |
| RN14 | O usuário pode gerar relatórios com base nos dados coletados. |
| RN15 | Relatórios devem permitir filtros por período e tipo de falha. |
| RN16 | Relatórios devem apresentar gráficos e análises. |

## Requisitos funcionais

| ID | Descrição |
|---|---|
| RF01 | O sistema deve permitir que o usuário realize login com e-mail e senha. |
| RF02 | O sistema deve validar as credenciais no banco de dados. |
| RF03 | O sistema deve redirecionar o usuário autenticado para a tela principal. |
| RF04 | O sistema deve impedir acesso com credenciais inválidas. |
| RF05 | O sistema deve permitir logout, encerrando a sessão. |
| RF06 | O sistema deve exibir o nome do administrador autenticado. |
| RF07 | O sistema deve apresentar botões de navegação (cadastro, monitoramento, relatórios). |
| RF08 | O sistema deve listar sensores cadastrados com: ID, Localização, Tipo de dado, Botão de excluir e Botão de detalhes |
| RF09 | O sistema deve permitir cadastrar sensores. |
| RF010 | O sistema deve permitir vincular sensores a um trem. |
| RF011 | O sistema deve armazenar os dados no banco de dados. |
| RF012 | O sistema deve listar todos os sensores cadastrados. |
| RF013 | O sistema deve permitir visualizar detalhes de um sensor. |
| RF014 | O sistema deve permitir solicitar exclusão de sensores. |
| RF015 | O sistema deve validar se o sensor possui dados registrados. |
| RF016 | O sistema deve impedir exclusão caso existam dados vinculados. |
| RF017 | O sistema deve exibir mensagem de erro ao impedir exclusão. |
| RF018 | O sistema deve receber dados dos sensores IoT. |
| RF019 | O sistema deve exibir:Velocidade, Localização e Status operacional |
| RF020 | O sistema deve atualizar os dados automaticamente (tempo real). |
| RF021 | O sistema deve permitir gerar relatórios. |
| RF022 | O sistema deve permitir aplicar filtros (período e tipo de falha). |
| RF023 | O sistema deve exibir gráficos interativos. |
| RF024 | O sistema deve listar relatórios já gerados. |
| RF025 | O sistema deve permitir visualizar relatórios detalhados. |

## Requisitos Não Funcionais

| ID | Descrição |
|---|---|
| RNF01 | O sistema deve utilizar um banco de dados relacional para armazenar as informações. |
| RNF02 | A aplicação deve utilizar o ambiente Apache para execução local. |
| RNF04 | A interface deve apresentar organização visual e facilidade de navegação. |
| RNF05 | O sistema deve utilizar Bootstrap para auxiliar na construção da interface. |
| RNF06 | As informações devem ser transmitidas entre a aplicação PHP e o banco de dados por meio de conexão MySQLi. |
| RNF07 | As senhas dos usuários devem ser armazenadas utilizando mecanismos de hash. |
| RNF08 | O sistema deve utilizar sessões para controlar a autenticação dos usuários. |
| RNF09 | A consulta de CEP deve depender da disponibilidade do serviço ViaCEP. |
| RNF10 | A consulta climática deve depender da disponibilidade da API OpenWeatherMap. |
| RNF12 | A aplicação deve manter uma organização de arquivos que facilite a manutenção e evolução do código. |

## Tecnologias Utilizadas
O sistema foi desenvolvido utilizando as seguintes tecnologias e ferramentas:

### Linguagens de programação e marcação

- PHP: responsável pelo processamento das informações, autenticação, comunicação
      com o banco de dados e operações CRUD.
- HTML: utilizado na estruturação das páginas e dos formulários.
- CSS: responsável pela estilização, identidade visual e organização dos elementos da
      interface.
- JavaScript: utilizado em interações e funcionalidades dinâmicas da aplicação.

### Banco de dados

- MySQL: responsável pelo armazenamento e gerenciamento das informações.
- MySQLi: utilizado para estabelecer a comunicação entre PHP e MySQL.

### Bibliotecas e frameworks

- Bootstrap: utilizado para auxiliar na construção dos componentes visuais e na
      organização da interface.
- Bootstrap Icons: biblioteca utilizada para disponibilizar ícones na aplicação.

### Ferramentas de desenvolvimento

- XAMPP: ambiente local utilizado para executar o Apache, PHP e MySQL.
- Apache: servidor web responsável por disponibilizar a aplicação localmente.
- phpMyAdmin: ferramenta utilizada para administrar o banco de dados.
- Visual Studio Code: editor de código utilizado durante o desenvolvimento.
- Git: ferramenta de controle de versão.
- GitHub: plataforma utilizada para armazenar e acompanhar o desenvolvimento do
        projeto.

### APIs utilizadas

- ViaCEP: serviço utilizado para consultar e validar CEPs brasileiros, permitindo o
      preenchimento automático dos campos de endereço.
- OpenWeatherMap: serviço utilizado para consultar informações climáticas de
      Joinville, Santa Catarina.

## Estrutura do Sistema
O XRAIL foi organizado em diferentes áreas, de acordo com as funcionalidades e os níveis
de acesso disponíveis.

1. Login: página inicial responsável pela autenticação dos usuários por meio de e-mail
       e senha.
2. Painel Administrativo: apresenta a área principal do administrador, com acesso às
       funcionalidades de gerenciamento e informações climáticas.
3. Usuários: permite cadastrar, consultar, editar, visualizar e excluir usuários, além de
       realizar o preenchimento automático de endereços por CEP.
4. Trens: permite cadastrar, visualizar, editar e excluir os trens registrados no sistema.
5. Sensores: disponibiliza funcionalidades para cadastrar, editar, excluir e consultar
       sensores, incluindo sua associação aos trens.
6. Rotas: permite cadastrar, consultar, editar e excluir informações das rotas
       ferroviárias.
7. Monitoramento: disponibiliza páginas específicas para administradores e usuários,
       permitindo pesquisar sensores por seus identificadores e consultar suas
       informações.
8. Painel do Usuário: apresenta as funcionalidades de consulta disponíveis para
       usuários comuns, incluindo rotas e monitoramento.

## Instalação e Configuração
Para executar e testar a aplicação localmente, é necessário utilizar o ambiente XAMPP.

### Pré-requisitos

- Ter o XAMPP instalado, com Apache, PHP e MySQL.
- Ter o Git instalado (opcional, mas recomendado).
- Ter um navegador atualizado.
- Possuir conexão com a internet para utilizar as APIs externas.

### Passo a passo

1. Baixar o projeto

Acesse o diretório raiz do XAMPP, geralmente localizado em C:\xampp\htdocs, e clone o
repositório:

```bash
cd C:\xampp\htdocs
```

```bash
git clone https://github.com/ketlynmelo/sa-ferrovia.git
```

Caso não utilize Git, baixe o projeto em formato ZIP pelo GitHub e extraia os arquivos dentro
da pasta htdocs.

#### 2. Iniciar os serviços no XAMPP

- Abra o XAMPP Control Panel.
- Inicie o serviço Apache.
- Inicie o serviço MySQL.

## Configuração e Importação do Banco de Dados
O sistema utiliza o banco de dados MySQL, cuja estrutura está documentada no arquivo:

```text
database/db.sql
```

O gerenciamento pode ser realizado pelo phpMyAdmin.

### Procedimento de importação

1. Abra o navegador e acesse http://localhost/phpmyadmin/.
2. Acesse a área de importação do phpMyAdmin.
3. Selecione o arquivo database/db.sql.
4. Execute a importação após validar a estrutura SQL e os relacionamentos.
5. Verifique se as tabelas foram criadas corretamente.

## Observação: Na tabela sensor e na tabela rotas existem ALTER TABLE que devem ser adicionadadas no sistema após a importação via página SQL.

O banco de dados possui as seguintes entidades principais:

- usuario: armazena os dados pessoais, credenciais, endereço, tipo de conta e status
      dos usuários.
- trem: armazena as informações de identificação, modelo, carga e velocidade dos
      trens.
- sensor: armazena o nome, localização, tipo de dado e identificação do trem
      associado.

- rota: armazena nome, horário, ponto inicial, ponto final, distância e referência de
      sensor.

## Orientações para Iniciar a Aplicação
Após configurar o ambiente, ajustar a conexão e preparar o banco de dados:

1. Abra o XAMPP Control Panel.
2. Verifique se Apache e MySQL estão em execução.
3. Abra o navegador.
4. Acesse o endereço:

```text
http://localhost/sa-ferrovia/
```

5. O sistema carregará a página inicial do XRAIL, permitindo realizar a autenticação.

## Perfis de Acesso e Permissões
O XRAIL possui dois tipos principais de usuários, com funcionalidades separadas conforme
as permissões de acesso.

### Administrador

O administrador possui acesso às funcionalidades de gerenciamento do sistema, podendo:

- Acessar o painel administrativo;
- Cadastrar usuários;
- Consultar e visualizar usuários;
- Editar informações dos usuários;
- Excluir usuários;
- Cadastrar trens;
- Consultar e visualizar trens;
- Editar informações dos trens;
- Excluir trens;
- Cadastrar sensores;
- Editar sensores;
- Excluir sensores;
- Gerenciar rotas;
- Acessar a área administrativa de monitoramento;
- Consultar informações climáticas no painel.

### Usuário

O usuário comum possui acesso às funcionalidades disponibilizadas para consulta e
acompanhamento, podendo:

- Acessar o painel do usuário;
- Consultar rotas cadastradas;
- Acessar a área de monitoramento;
- Pesquisar sensores por identificador;
- Consultar informações disponíveis dos sensores;
- Encerrar a sessão.

### Segurança e controle de acesso

A aplicação utiliza sessões PHP para controlar a autenticação e verificar o perfil dos
usuários.

Também realiza a verificação do status da conta, impedindo que usuários inativos continuem
acessando as áreas restritas.

As senhas são verificadas por meio de mecanismos de hash, e as operações com o banco
de dados utilizam MySQLi.

## Funcionalidades das Principais Páginas
### Página de Login

A página inicial permite que os usuários acessem o sistema utilizando suas credenciais.

Os campos disponíveis são:

- E-mail;
- Senha.

Após a autenticação, o sistema direciona o usuário conforme o seu tipo de conta.

### Página Inicial do Administrador

O painel administrativo apresenta informações gerais e atalhos para as principais
funcionalidades.

Entre seus recursos estão:

- Identificação do usuário autenticado;
- Consulta das condições climáticas de Joinville;
- Acesso ao cadastro de trens;
- Acesso ao cadastro de sensores;

- Visualização de informações dos sensores cadastrados;
- Navegação para as demais áreas administrativas.

### Página de Usuários

Área administrativa destinada ao gerenciamento dos usuários cadastrados.

Permite:

- Adicionar usuários;
- Consultar usuários;
- Pesquisar registros;
- Visualizar informações individuais;
- Editar dados cadastrais;
- Excluir usuários.

Os formulários contemplam informações como:

- Nome;
- CPF;
- Data de nascimento;
- E-mail;
- Senha;
- Tipo de conta;
- Status;
- CEP;
- Logradouro;
- Número;
- Bairro;
- Cidade;
- UF.

Consulta de CEP: a integração com a API ViaCEP permite preencher automaticamente as
informações de endereço a partir do CEP informado, quando os dados estão disponíveis.

### Página de Trens

Área destinada ao gerenciamento dos trens cadastrados.

Permite:

- Cadastrar novos trens;
- Visualizar informações dos trens;
- Editar registros existentes;
- Excluir trens.

As informações contempladas incluem:

- ID do trem;

- Nome do trem;
- Modelo;
- Carga;
- Velocidade.

### Página de Sensores

Área responsável pelo gerenciamento dos sensores associados aos trens.

Permite:

- Cadastrar sensores;
- Consultar sensores;
- Editar informações;
- Excluir registros;
- Associar sensores aos respectivos trens.

As informações contempladas incluem:

- ID do sensor;
- Nome do sensor;
- Localização;
- Tipo de dado;
- Trem associado.

Os tipos de dados previstos no banco incluem velocidade, temperatura, falha, vibração,
localização e proximidade.

### Página de Rotas

Área destinada ao cadastro e gerenciamento das rotas ferroviárias.

Permite:

- Cadastrar novas rotas;
- Consultar rotas;
- Editar informações;
- Excluir registros.

As informações contempladas incluem:

- ID da rota;
- Nome da rota;
- Horário;
- Ponto inicial;
- Ponto final;
- Distância;
- Referência de sensor.

### Página de Monitoramento

A área de monitoramento possui páginas específicas para os dois perfis de acesso.

O sistema disponibiliza um campo de pesquisa para informar o identificador do sensor e
acessar sua página de visualização.

O objetivo é facilitar a consulta das informações cadastradas e permitir que os usuários
acompanhem os dados disponibilizados pelo sistema.

### Integração com a API ViaCEP

A integração com o ViaCEP é utilizada nos formulários de cadastro e edição de usuários.

O funcionamento ocorre por meio da seguinte sequência:

1. O usuário informa o CEP.
2. O sistema valida a quantidade de números informados.
3. O arquivo consultar_cep.php realiza a consulta ao serviço ViaCEP.
4. A resposta é processada em formato JSON.
5. Os campos de logradouro, bairro, cidade e UF são preenchidos quando disponíveis.

### Integração com a API OpenWeatherMap

A integração climática está localizada no arquivo infra/clima.php.

O sistema realiza uma requisição à OpenWeatherMap utilizando coordenadas geográficas
de Joinville, Santa Catarina.

As informações apresentadas incluem:

- Temperatura atual;
- Descrição das condições climáticas;
- Umidade;
- Nebulosidade;
- Horário da última medição.

Os dados são apresentados no painel administrativo.

## Documentação e Relatórios do Projeto
O diretório documentos/ reúne os materiais de pesquisa e os registros utilizados durante o
desenvolvimento do XRAIL.

| Documento | Descrição |
|---|---|
| pesquisa_PDO.md | Pesquisa sobre PDO e conexão com bancos de dados em PHP. |
| pesquisa_apis.md | Estudo sobre APIs, requisições HTTP e integração de serviços externos. |
| pesquisa_crud.md | Documentação sobre as operações Create, Read, Update e Delete. |
| pesquisa_identidade_visual.md | Registro das decisões relacionadas à identidade visual do XRAIL. |
| pesquisa_scrum.md | Pesquisa sobre a metodologia ágil Scrum. |
| pesquisa_xampp.md | Pesquisa sobre o ambiente de desenvolvimento XAMPP. |
| relatorio_IA.md | Relatório de utilização de inteligência artificial durante o desenvolvimento do projeto. |

Os documentos permitem acompanhar as pesquisas realizadas, os conhecimentos
aplicados e as decisões técnicas tomadas durante a construção do sistema.

Demais documentos (incluindo manual do usuário) estão em acesso via [https://drive.google.com/drive/folders/1lrkIVgL50dU-LjoUQvBCl9r2YP-i4iXr?usp=sharing](https://drive.google.com/drive/folders/1lrkIVgL50dU-LjoUQvBCl9r2YP-i4iXr?usp=sharing)

## Integrantes e Contribuições
O desenvolvimento do projeto foi realizado de forma colaborativa, com participação dos
integrantes nas atividades de planejamento, programação, organização e documentação.

Grupo de desenvolvedores:

- Ketlyn de Melo
- Igor Gabriel Paradella
- Matheus Henrique da Silveira
- Arthur Menestrina Heimann

As atividades foram desenvolvidas em equipe, envolvendo a construção das interfaces,
implementação das funcionalidades, integração com o banco de dados, testes, correção de
erros e documentação do projeto.

## Metodologias de Desenvolvimento
Para auxiliar na organização e no acompanhamento das atividades, o projeto utiliza
conceitos da metodologia ágil Scrum e Kanban.

### Scrum:

O Scrum permite dividir o desenvolvimento em etapas menores, facilitando a organização
das tarefas, a comunicação entre os integrantes e a evolução contínua do sistema.

### Kanban:

Utilizaremos o Kanban como nosso principal suporte para gerenciar as tarefas visualmente e
organizar as tarefas individualmente.

"A fazer"

"Em progresso"

"Revisão"

"Entregue"

### Scrum e Kanban

O Scrum é utilizado como referência para organizar as atividades do projeto por meio de
ciclos de desenvolvimento chamados Sprints. Em conjunto, utilizamos o Kanban para dividir
as atividades de cada Sprint em pequenas tarefas, facilitando a organização, a distribuição
das responsabilidades e o acompanhamento do progresso da equipe.

Entre os principais conceitos estudados e aplicados estão:

- Sprint: período destinado ao desenvolvimento de determinadas funcionalidades.
- Sprint Planning: planejamento das atividades que serão realizadas.
- Daily Scrum: acompanhamento do andamento das tarefas e identificação de
      dificuldades.
- Sprint Review: apresentação e avaliação das funcionalidades desenvolvidas.
- Sprint Retrospective: análise dos resultados e identificação de melhorias para as
      próximas etapas.

A documentação da metodologia está disponível em documentos/pesquisa_scrum.md.

## Limitações Conhecidas
- Monitoramento: a aplicação disponibiliza consultas de sensores por identificador,
      mas não possui integração com sensores físicos para transmissão contínua de
      dados em tempo real.
- APIs externas: as funcionalidades de consulta de CEP e clima dependem da
      disponibilidade dos serviços ViaCEP e OpenWeatherMap.
- Conexão com o banco: a aplicação depende da configuração correta do servidor
      MySQL, da porta de conexão e das credenciais definidas no arquivo de
      infraestrutura.
- Ambiente local: a instalação descrita utiliza XAMPP e requer a configuração prévia
      do banco de dados e das integrações externas.

## Versão Final do Sistema

Algumas imagens da versão final do sistema XRAIL:

![Sistema XRAIL](README_assets/sistema-000.png)

![Sistema XRAIL](README_assets/sistema-001.png)

![Sistema XRAIL](README_assets/sistema-002.png)

![Sistema XRAIL](README_assets/sistema-003.png)

![Sistema XRAIL](README_assets/sistema-004.png)

![Sistema XRAIL](README_assets/sistema-005.png)

![Sistema XRAIL](README_assets/sistema-006.png)

![Sistema XRAIL](README_assets/sistema-007.png)

![Sistema XRAIL](README_assets/sistema-008.png)

XRAIL — Tecnologia, organização e monitoramento ferroviário.
