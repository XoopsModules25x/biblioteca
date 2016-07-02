<?php
/**
 * ****************************************************************************
 *  - biblioteca By Leandro Angelo
 *
 *  - Este é um módulo clonado do TDMDownloads
 *
 * 1. La liberté d'exécuter le logiciel, pour n'importe quel usage,
 * 2. La liberté de l' étudier et de l'adapter à ses besoins,
 * 3. La liberté de redistribuer des copies,
 * 4. La liberté d'améliorer et de rendre publiques les modifications afin
 * que l'ensemble de la communauté en bénéficie.
 *
 * @copyright     http://www.jequiehost.com
 * @license       http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author        Leandro Angelo; TEAM DEV MODULE
 *
 * ****************************************************************************
 */
// index.php
define('_AM_BIBLIOTECA_INDEX_BROKEN', "Há <b><span style='color : Red'> %s </span></b> Relatório(s) de Livros Corrompidos");
define('_AM_BIBLIOTECA_INDEX_CHANGELOG', '<b>Changelog</b>');
define('_AM_BIBLIOTECA_INDEX_DOWNLOADS', "Há <b><span style='color : Red'> %s </span></b> Livro(s) no Banco de Dados");
define('_AM_BIBLIOTECA_INDEX_DOWNLOADSWAITING', "Há <b><span style='color : Red'> %s </span></b> Livro(s) à espera de aprovação");
define('_AM_BIBLIOTECA_INDEX_ERREURFOLDER', "ERRO:'biblioteca' diretório em '%s/uploads/' não pode ser criado, você tem que criá-lo manualmente <br><br>Basta copiar a pasta 'biblioteca' (Você pode encontra-lo no diretório 'extra' do módule) no diretório 'uploads' acima");
define('_AM_BIBLIOTECA_INDEX_ERREURPHP', 'ERRO: Este menu exige pelo menos o PHP 5.0 ou superior.');
define('_AM_BIBLIOTECA_INDEX_MODIFIED', "Há <b><span style='color : Red'> %s </span></b> Livro(s) com pedidos de atualização");
define('_AM_BIBLIOTECA_INDEX_UPDATE_INFO', 'Você está usando a versão mais recente do módulo biblioteca');
define('_AM_BIBLIOTECA_INDEX_VERSION_ALLOWURLFOPEN', "Para determinar se uma nova versão do biblioteca existe, você deve ter 'allow_url_fopen' para 'on' no php.ini do servidor");
define('_AM_BIBLIOTECA_INDEX_VERSION_FICHIER_KO', 'O arquivo de gerenciamento de versão do módulo biblioteca está atualmente indisponível');
define('_AM_BIBLIOTECA_INDEX_VERSION_NOT_OK', "Há uma nova versão do módulo biblioteca %s, você pode fazer o download <a href='http://www.jequiehost.com/modules/TDMDownloads/viewcat.php?cid=1' target='_blank'>aqui</a>");
define('_AM_BIBLIOTECA_INDEX_VERSION_OK', 'Você está usando a versão mais recente do módulo biblioteca %s');

//category.php
define('_AM_BIBLIOTECA_CAT_NEW', 'Nova categoria');
define('_AM_BIBLIOTECA_CAT_LIST', 'Lista das categorias');
define('_AM_BIBLIOTECA_DELDOWNLOADS', 'com os livros a seguir:');
define('_AM_BIBLIOTECA_DELSOUSCAT', 'As seguintes categorias serão totalmente apagadas:');

//downloads.php
define('_AM_BIBLIOTECA_DOWNLOADS_LISTE', 'Lista dos livros');
define('_AM_BIBLIOTECA_DOWNLOADS_NEW', 'Enviar livro');
define('_AM_BIBLIOTECA_DOWNLOADS_SEARCH', 'Pesquisar');
define('_AM_BIBLIOTECA_DOWNLOADS_VOTESANONYME', 'Votos anônimos (total de votos : %s)');
define('_AM_BIBLIOTECA_DOWNLOADS_VOTESUSER', 'Votes dos usuários (total de votos : %s)');
define('_AM_BIBLIOTECA_DOWNLOADS_VOTE_USER', 'Usuários');
define('_AM_BIBLIOTECA_DOWNLOADS_VOTE_IP', 'Endereço IP');
define('_AM_BIBLIOTECA_DOWNLOADS_WAIT', 'Aguardando aprovação');

//broken.php
define('_AM_BIBLIOTECA_BROKEN_SENDER', 'Contatar o autor');
define('_AM_BIBLIOTECA_BROKEN_SURDEL', 'Você tem certeza que quer apagar esta mensagem?');

//modified.php
define('_AM_BIBLIOTECA_MODIFIED_MOD', 'Enviado por;');
define('_AM_BIBLIOTECA_MODIFIED_ORIGINAL', 'Original');
define('_AM_BIBLIOTECA_MODIFIED_SURDEL', 'Tem certeza de que deseja excluir este pedido de atualização do livro?');

//field.php
define('_AM_BIBLIOTECA_DELDATA', 'Com os seguintes dados:');
define('_AM_BIBLIOTECA_FIELD_LIST', 'Lista de campos');
define('_AM_BIBLIOTECA_FIELD_NEW', 'Novo campo');

//about.php
define('_AM_BIBLIOTECA_ABOUT_AUTHOR', 'Autor');
define('_AM_BIBLIOTECA_ABOUT_CHANGELOG', 'Descrição da versão');
define('_AM_BIBLIOTECA_ABOUT_CREDITS', 'Créditos');
define('_AM_BIBLIOTECA_ABOUT_FILEPROTECTION', 'Arquivos Protegidos');
define('_AM_BIBLIOTECA_ABOUT_FILEPROTECTION_INFO1', "Para proteger seus livros contra downloads potencialmente indesejados (em comparação com permissões), você tem que criar um '.htaccess' no diretório:");
define('_AM_BIBLIOTECA_ABOUT_FILEPROTECTION_INFO2', 'Com o seguinte conteúdo:');
define('_AM_BIBLIOTECA_ABOUT_LICENSE', 'Licença');
define('_AM_BIBLIOTECA_ABOUT_MODULEINFOS', 'Informações sobre o módulo');
define('_AM_BIBLIOTECA_ABOUT_MODULEWEBSITE', 'Suporte Website');
define('_AM_BIBLIOTECA_ABOUT_RELEASEDATE', 'Data do envio');
define('_AM_BIBLIOTECA_ABOUT_STATUS', 'Status');

//permissions.php
define('_AM_BIBLIOTECA_PERMISSIONS_4', 'Enviar um livro');
define('_AM_BIBLIOTECA_PERMISSIONS_8', 'Enviar livro atualizado');
define('_AM_BIBLIOTECA_PERMISSIONS_16', 'Avaliar os livros');
define('_AM_BIBLIOTECA_PERMISSIONS_32', 'Enviar livros');
define('_AM_BIBLIOTECA_PERMISSIONS_64', 'Aprovar automaticamente os livros enviados');
define('_AM_BIBLIOTECA_PERM_AUTRES', 'Outras permissões');
define('_AM_BIBLIOTECA_PERM_AUTRES_DSC', 'Selecione os grupos que deseja autorizar:');
define('_AM_BIBLIOTECA_PERM_DOWNLOAD', 'Permissões para downloads');
define('_AM_BIBLIOTECA_PERM_DOWNLOAD_DSC', 'Selecione os grupos que pode baixar nas categorias');
define('_AM_BIBLIOTECA_PERM_DOWNLOAD_DSC2', 'Selecione os grupos que podem baixar os livros');
define('_AM_BIBLIOTECA_PERM_SUBMIT', 'Permissão para enviar');
define('_AM_BIBLIOTECA_PERM_SUBMIT_DSC', 'Escolha o(s) grupo(s) que podem enviar livros para as categorias');
define('_AM_BIBLIOTECA_PERM_VIEW', 'Permissões de acesso');
define('_AM_BIBLIOTECA_PERM_VIEW_DSC', 'Selecione o(s) grupo(s) que pode visualizar as categorias');

// Import.php
define('_AM_BIBLIOTECA_IMPORT1', 'Importar');
define('_AM_BIBLIOTECA_IMPORT_CAT_IMP', "Categorias: '%s' importação");
define('_AM_BIBLIOTECA_IMPORT_CONF_MYDOWNLOADS', 'Tem certeza que você deseja importar dados do Mydownloads para o módulo biblioteca');
define('_AM_BIBLIOTECA_IMPORT_CONF_WFDOWNLOADS', 'Tem certeza que você deseja importar dados do WF-Downloads para o módulo biblioteca');
define('_AM_BIBLIOTECA_IMPORT_DONT_DOWNLOADS', 'Não há arquivos para importação');
define('_AM_BIBLIOTECA_IMPORT_DONT_TOPIC', 'Não há arquivos para importação');
define('_AM_BIBLIOTECA_IMPORT_DOWNLOADS', 'Importar arquivos');
define('_AM_BIBLIOTECA_IMPORT_DOWNLOADS_IMP', "arquivos: '%s' importação;");
define('_AM_BIBLIOTECA_IMPORT_ERREUR', 'Selecione Diretório para Upload (o caminho)');
define('_AM_BIBLIOTECA_IMPORT_ERROR_DATA', 'Erro durante a importação de dados');
define('_AM_BIBLIOTECA_IMPORT_MYDOWNLOADS', 'Importar do Mydownloads');
define('_AM_BIBLIOTECA_IMPORT_MYDOWNLOADS_PATH', 'Selecione Diretório para Upload (o caminho) para screen shots do Mydownloads');
define('_AM_BIBLIOTECA_IMPORT_MYDOWNLOADS_URL', 'Escolha a URL correspondente para screen shots do Mydownloads');
define('_AM_BIBLIOTECA_IMPORT_NB_CAT', 'Existem %s categorias para importação');
define('_AM_BIBLIOTECA_IMPORT_NB_DOWNLOADS', 'Existem %s arquivos para importação');
define('_AM_BIBLIOTECA_IMPORT_NUMBER', 'Dados para importação');
define('_AM_BIBLIOTECA_IMPORT_OK', 'Importação feita com sucesso !!!');
define('_AM_BIBLIOTECA_IMPORT_VOTE_IMP', "VOTOS: '%s' importação;");
define('_AM_BIBLIOTECA_IMPORT_WARNING',
       "<span style='color:#FF0000; font-size:16px; font-weight:bold'>Atenção !</span><br><br> Com a importação vai apagar todos os dados em biblioteca.<br><br> É altamente recomendado que você faça um backup dos seus dados, também do seu site<br><br>TDM não é responsável se você perder seus dados.");
define('_AM_BIBLIOTECA_IMPORT_WFDOWNLOADS', 'Importar do WF Downloads(somente V3.2 RC2)');
define('_AM_BIBLIOTECA_IMPORT_WFDOWNLOADS_CATIMG', 'Selecione Diretório para Upload (o caminho) para as imagens das categorias do WF-Downloads');
define('_AM_BIBLIOTECA_IMPORT_WFDOWNLOADS_SHOTS', 'Selecione Diretório para Upload (o caminho) para screenshots do WF-Downloads');

//Pour les options de filtre
define('_AM_BIBLIOTECA_ORDER', ' Ordem: ');
define('_AM_BIBLIOTECA_TRIPAR', 'Ordenados por: ');

//Formulaire et tableau
define('_AM_BIBLIOTECA_FORMADD', 'Adicionar');
define('_AM_BIBLIOTECA_FORMACTION', 'Ação');
define('_AM_BIBLIOTECA_FORMAFFICHE', 'Exibir o campo?');
define('_AM_BIBLIOTECA_FORMAFFICHESEARCH', 'Pesquisa no campo?');
define('_AM_BIBLIOTECA_FORMAPPROVE', 'Aprovar');
define('_AM_BIBLIOTECA_FORMCAT', 'Categoria');
define('_AM_BIBLIOTECA_FORMCOMMENTS', 'Número de comentários');
define('_AM_BIBLIOTECA_FORMDATE', 'Data');
define('_AM_BIBLIOTECA_FORMDATEUPDATE', 'Atualizar a data?');
define('_AM_BIBLIOTECA_FORMDATEUPDATE_NO', 'Não');
define('_AM_BIBLIOTECA_FORMDATEUPDATE_YES', 'Sim -->');
define('_AM_BIBLIOTECA_FORMDEL', 'Apagar');
define('_AM_BIBLIOTECA_FORMDISPLAY', 'Exibir');
define('_AM_BIBLIOTECA_FORMEDIT', 'Editar');
define('_AM_BIBLIOTECA_FORMFILE', 'Livro');
define('_AM_BIBLIOTECA_FORMHITS', 'Downloads');
define('_AM_BIBLIOTECA_FORMHOMEPAGE', 'Página principal');
define('_AM_BIBLIOTECA_FORMLOCK', 'Desativar o download do livro');
define('_AM_BIBLIOTECA_FORMIGNORE', 'Ignorar');
define('_AM_BIBLIOTECA_FORMINCAT', 'Na categoria');
define('_AM_BIBLIOTECA_FORMIMAGE', 'Imagem');
define('_AM_BIBLIOTECA_FORMIMG', 'Logo');
define('_AM_BIBLIOTECA_FORMPAYPAL', 'Endereço Paypal para doação');
define('_AM_BIBLIOTECA_FORMPATH', 'Livros em: %s');
define('_AM_BIBLIOTECA_FORMPLATFORM', 'Formato');
define('_AM_BIBLIOTECA_FORMPOSTER', 'Publicado por ');
define('_AM_BIBLIOTECA_FORMRATING', 'Nota');
define('_AM_BIBLIOTECA_FORMSIZE', 'Tamanho do arquivo em(bytes)');
define('_AM_BIBLIOTECA_FORMSTATUS', 'Status do download');
define('_AM_BIBLIOTECA_FORMSTATUS_OK', 'Aprovado');
define('_AM_BIBLIOTECA_FORMSUBMITTER', 'Publicado por');
define('_AM_BIBLIOTECA_FORMSUREDEL', "Tem certeza de que deseja excluir: <b><span style='color : Red'> %s </span></b>");
define('_AM_BIBLIOTECA_FORMTEXT', 'Descrição');
define('_AM_BIBLIOTECA_FORMTEXTDOWNLOADS', "Descrição : <br><br>Use o delimitador '<b>[pagebreak]</b>' Prefira uam descrição curta. <br> Uma breve descrição permite reduzir o tamanho do texto na página inicial do módulo e categorias.");
define('_AM_BIBLIOTECA_FORMTITLE', 'Título');
define('_AM_BIBLIOTECA_FORMUPLOAD', 'Upload');
define('_AM_BIBLIOTECA_FORMURL', 'Download URL');
define('_AM_BIBLIOTECA_FORMVALID', 'Ativar o download do livro');
define('_AM_BIBLIOTECA_FORMVERSION', 'Versão');
define('_AM_BIBLIOTECA_FORMVOTE', 'Votos');
define('_AM_BIBLIOTECA_FORMWEIGHT', 'Posição');
define('_AM_BIBLIOTECA_FORMWITHFILE', 'Com o livro: ');

//Message d'erreur
define('_AM_BIBLIOTECA_ERREUR_CAT', 'Você não pode usar essa categoria (looping sobre si mesmo)');
define('_AM_BIBLIOTECA_ERREUR_NOBMODDOWNLOADS', 'Não há nenhum livro atualizado');
define('_AM_BIBLIOTECA_ERREUR_NOBROKENDOWNLOADS', 'Não há Livros Corrompidos');
define('_AM_BIBLIOTECA_ERREUR_NOCAT', 'Você tem que escolher uma categoria!');
define('_AM_BIBLIOTECA_ERREUR_NODESCRIPTION', 'Você tem que escrever à descrição');
define('_AM_BIBLIOTECA_ERREUR_NODOWNLOADS', 'Você ainda não enviou nenhum livro.');
define('_AM_BIBLIOTECA_ERREUR_SIZE', 'O tamanho do arquivo deve ser um número');
define('_AM_BIBLIOTECA_ERREUR_WEIGHT', 'Sua nota deve ser um número');

//Message de redirection
define('_AM_BIBLIOTECA_REDIRECT_DELOK', 'Apagado com sucesso! ');
define('_AM_BIBLIOTECA_REDIRECT_NOCAT', 'Você tem que criar uma categoria');
define('_AM_BIBLIOTECA_REDIRECT_NODELFIELD', 'Você não pode excluir este campo (campo básico)');
define('_AM_BIBLIOTECA_REDIRECT_SAVE', 'Banco de dados atualizado com sucesso!');
