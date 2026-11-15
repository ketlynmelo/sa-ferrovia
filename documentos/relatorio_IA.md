# Relatório de Utilização da IA – Projeto XRail

### 1. Ferramenta de IA utilizada

Foi utilizado o ChatGPT, da OpenAI, como ferramenta de apoio durante o desenvolvimento do sistema XRail.

### 2. Objetivo das utilizações

A IA foi utilizada para auxiliar na implementação de duas integrações:

- **API ViaCEP:** consultar CEPs brasileiros e preencher automaticamente os campos de endereço dos usuários.
- **API OpenWeatherMap:** consultar informações climáticas e apresentá-las no painel do sistema.

Também foi utilizada para identificar erros e melhorar trechos do código.

### 3. Principais prompts utilizados

Algumas das instruções fornecidas foram:

- "Pesquise e utilize uma API para consultar e validar CEPs brasileiros."
- "Quero que seja possível escolher uma das UFs do Brasil ou digitar manualmente."
- "Me ajude a integrar uma API de clima ao sistema."
- "Encontre o problema no código e me ajude a corrigir."

### 4. Arquivos e funcionalidades desenvolvidos

Com o auxílio da IA, foram implementados ou ajustados:

- `consultar_cep.php`: responsável pela consulta ao ViaCEP.
- `adicionar_usuario.php` e `editar_usuario.php`: formulários com preenchimento automático do endereço.
- `infra/clima.php`: responsável pela consulta à OpenWeatherMap.
- `adm_home.php`: exibição das informações climáticas no painel administrativo.

### 5. Alterações realizadas pela equipe

Os códigos sugeridos foram adaptados à estrutura do XRail. Foram adicionados campos de endereço, como número da residência, e ajustados os formulários, caminhos dos arquivos e comandos SQL para integrar as funcionalidades ao banco de dados.

### 6. Testes realizados

Foram realizadas verificações para conferir o preenchimento automático dos endereços, a consulta das informações climáticas e o salvamento dos dados no banco de dados. Também foram analisadas mensagens de erro para corrigir problemas durante a implementação.

### 7. Problemas identificados e correções

Durante o desenvolvimento, ocorreram problemas com caminhos de arquivos, quantidade de parâmetros no `bind_param()` e comunicação entre JavaScript e PHP. Com o auxílio da IA, os erros foram identificados e corrigidos, adaptando os códigos à organização do projeto.

### 8. Reflexão sobre a utilização da IA

A inteligência artificial contribuiu para facilitar o desenvolvimento e a compreensão das integrações com APIs. Entretanto, suas sugestões nem sempre funcionaram diretamente no projeto, sendo necessário analisar, adaptar e testar os códigos. Dessa forma, a equipe participou ativamente do desenvolvimento, utilizando a IA como ferramenta de apoio, e não como substituta do conhecimento dos integrantes.