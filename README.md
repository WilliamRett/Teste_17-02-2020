Olá 
 
O objetivo do teste é avaliar seus conhecimentos com o framework Laravel, com a linguagem PHP e com GIT. 
 
Passos para execução do teste: 
 
1. Criar projeto no github ou bitbucket público
2. Instalar o framework laravel
3. Criar UMA tela no laravel usando blade que permita o cadastro dos seguintes campos: Nome, Sobrenome, Email, Data de Nascimento e até 6 Telefones e endereço (veja detalhes abaixo).
4. Criar uma API no Laravel que retorne uma lista com os dados cadastrados no item anterior.
5. Criar UMA tela que permita a visualização dos dados retornados pela API desenvolvida no item anterior em blade no formato de tabela.
6. Criar uma tela que permita a visualização e edição do detalhe dos dados cadastrados, a forma que você deve recuperar os dados será através de um endpoint.
7. Subir todos arquivos no repositório git (O projeto precisa ter um README com os passos para execução). 
 
O objetivo é que o avaliador possa ler o arquivo README e seguindo os passos faça com que o projeto seja executado. 
 
Detalhes: Para recuperar os dados do endereço, você deverá usar uma API pública que recupere os dados através do CEP. (​https://viacep.com.br​) - Faça isso em Javascript. 
 
PS: O projeto está bem simples, porém lembre-se que você está sendo avaliado pelos seus conhecimentos técnicos. 


Para A Execução do Projeto :

1-> rode o Comando composer install (caso ja tenha o php instalado na maquina),

2-> rode o Comando php artisan migrate:fresh --seed,

3-> rode o Comando php artisan serve 
