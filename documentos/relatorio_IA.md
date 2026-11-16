# Relatório de Utilização da IA – Projeto XRail

## 1. Ferramenta de IA utilizada

Foi utilizado o ChatGPT, da OpenAI, como ferramenta de apoio durante o desenvolvimento do sistema XRail.

## 2. Objetivo das utilizações

A IA foi utilizada para auxiliar no desenvolvimento e aprimoramento do sistema, principalmente em três etapas:

- **Primeira etapa – API ViaCEP:** consulta de CEPs brasileiros e preenchimento automático dos campos de endereço dos usuários.
- ***                API OpenWeatherMap:** consulta de informações climáticas e apresentação dos dados no painel administrativo.
- ***Segunda etapa – Landing Page:** criação e implementação de uma página inicial para apresentar o projeto XRail, suas funcionalidades e facilitar o acesso à plataforma.

Também foi utilizada para identificar erros, corrigir problemas e melhorar trechos do código.

---

## Primeira etapa – Integração com APIs

### Objetivo das utilizações

A IA foi utilizada para auxiliar na criação e implementação de API's para o sistema XRail, com o objetivo de buscar informações complementares, funcionais e estéticas à plataforma.


### Principais prompts utilizados

Algumas das instruções fornecidas foram:

- "Pesquise e utilize uma API para consultar e validar CEPs brasileiros."
- "Quero que seja possível escolher uma das UFs do Brasil ou digitar manualmente."
- "Me ajude a integrar uma API de clima ao sistema."
- "Encontre o problema no código e me ajude a corrigir."

### Arquivos e funcionalidades desenvolvidos

Com o auxílio da IA, foram implementados ou ajustados:

- `consultar_cep.php`: responsável pela consulta ao ViaCEP.
- `adicionar_usuario.php` e `editar_usuario.php`: formulários com preenchimento automático do endereço.
- `infra/clima.php`: responsável pela consulta à OpenWeatherMap.
- `adm_home.php`: exibição das informações climáticas no painel administrativo.

### Alterações realizadas pela equipe

Os códigos sugeridos foram adaptados à estrutura do XRail. Foram adicionados campos de endereço, como número da residência, e ajustados os formulários, caminhos dos arquivos e comandos SQL para integrar as funcionalidades ao banco de dados.

### Testes realizados

Foram realizadas verificações para conferir o preenchimento automático dos endereços, a consulta das informações climáticas e o salvamento dos dados no banco de dados. Também foram analisadas mensagens de erro para corrigir problemas durante a implementação.

### Problemas identificados e correções

Durante o desenvolvimento, ocorreram problemas com caminhos de arquivos, quantidade de parâmetros no `bind_param()` e comunicação entre JavaScript e PHP. Com o auxílio da IA, os erros foram identificados e corrigidos, adaptando os códigos à organização do projeto.

---

## Segunda etapa – Implementação da Landing Page

### Objetivo das utilizações

A IA foi utilizada para auxiliar na criação e implementação de uma landing page para o sistema XRail, com o objetivo de apresentar o projeto, suas funcionalidades e facilitar o acesso dos usuários à plataforma.

### Principais prompts utilizados

Foram utilizadas instruções para auxiliar na:

- Criação de uma página inicial para apresentar o projeto XRail.
- Organização das seções e informações da página.
- Desenvolvimento de uma interface visual moderna e organizada.
- Implementação de elementos de navegação e apresentação das funcionalidades.

### Arquivos e funcionalidades desenvolvidos

Com o auxílio da IA, foram implementados ou ajustados:

- `index.php`: estrutura da landing page, incluindo menu de navegação, apresentação inicial, seção sobre o projeto, funcionalidades e rodapé.
- `style/style.css`: estilos visuais, cores, espaçamentos, botões, cartões e responsividade da página.

Também foram utilizadas as bibliotecas Bootstrap e Bootstrap Icons para auxiliar na estruturação e nos elementos visuais da interface.

### Funcionalidades implementadas

A landing page passou a apresentar:

- **Início:** apresentação do XRail com a frase "Movendo o futuro sobre trilhos".
- **Sobre:** explicação dos objetivos do projeto e da utilização de sensores IoT no monitoramento ferroviário.
- **Funcionalidades:** apresentação de recursos como monitoramento dos trens, sensores IoT, identificação de falhas e manutenção preditiva.
- **Navegação:** menu com links para acessar as diferentes seções da página.
- **Acesso à plataforma:** botões direcionados à área de acesso do sistema.
- **Rodapé:** identificação do projeto e informações complementares.

### Alterações realizadas pela equipe

Os códigos sugeridos pela IA foram adaptados à estrutura existente do XRail. Foram ajustados os caminhos das imagens, os arquivos de estilo, os elementos de navegação e a organização das seções, mantendo a identidade visual do projeto.

### Testes realizados

Foram realizadas verificações da navegação entre as seções, apresentação dos elementos visuais, funcionamento dos links e adaptação da página a diferentes tamanhos de tela.

### Problemas identificados e correções

Durante a implementação, foram necessários ajustes na estrutura HTML e CSS para organizar os elementos da página, corrigir posicionamentos e adequar a apresentação em diferentes tamanhos de tela. Também foram realizados ajustes nos links de navegação e nos elementos visuais para manter a consistência da interface.

---

## Considerações finais

### Reflexão sobre a utilização da IA

A inteligência artificial contribuiu para facilitar o desenvolvimento do XRail em diferentes etapas, auxiliando tanto na integração de APIs quanto na criação da interface de apresentação do sistema.

Entretanto, suas sugestões nem sempre funcionaram diretamente no projeto, sendo necessário analisar, adaptar e testar os códigos. Dessa forma, a equipe participou ativamente do desenvolvimento, utilizando a IA como ferramenta de apoio, e não como substituta do conhecimento dos integrantes.
