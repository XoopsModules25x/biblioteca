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
// Non du module
define('_MI_BIBLIOTECA_NAME', 'biblioteca');

// Description du module
define('_MI_BIBLIOTECA_DESC', 'Cria uma seção de downloads onde os usuários podem fazer download/enviar/classificar varios arquivos.');

// Bloc
define('_MI_BIBLIOTECA_BNAME1', 'Livros Novos');
define('_MI_BIBLIOTECA_BNAMEDSC1', 'Exibe os livros que foram adicionados recentementes');
define('_MI_BIBLIOTECA_BNAME2', 'Livro mais Baixados');
define('_MI_BIBLIOTECA_BNAMEDSC2', 'Exibe os livros mais baixados');
define('_MI_BIBLIOTECA_BNAME3', 'Livros mais Votados');
define('_MI_BIBLIOTECA_BNAMEDSC3', 'Exibe os livros mais votados');
define('_MI_BIBLIOTECA_BNAME4', 'Livros Aleátorios');
define('_MI_BIBLIOTECA_BNAMEDSC4', 'Exibe livros aleatoriamente');

// Sous menu
define('_MI_BIBLIOTECA_SMNAME1', 'Enviar livro');
define('_MI_BIBLIOTECA_SMNAME2', 'Lista de livros');

// Menu administration
define('_MI_BIBLIOTECA_ADMENU1', 'Principal');
define('_MI_BIBLIOTECA_ADMENU2', 'Gerenciar Categorias');
define('_MI_BIBLIOTECA_ADMENU3', 'Gerenciar Livros');
define('_MI_BIBLIOTECA_ADMENU4', 'Livros Corrompidos');
define('_MI_BIBLIOTECA_ADMENU5', 'Livros Atualizados');
define('_MI_BIBLIOTECA_ADMENU6', 'Gerenciar Campos');
define('_MI_BIBLIOTECA_ADMENU7', 'Sobre');
define('_MI_BIBLIOTECA_ADMENU8', 'Permissões');
define('_MI_BIBLIOTECA_ADMENU9', 'Atualizar Módulo');
define('_MI_BIBLIOTECA_ADMENU10', 'Importar');

// Préférences
define('_MI_BIBLIOTECA_POPULAR', 'Quantidade de livros baixados par ser considerado popular');
define('_MI_BIBLIOTECA_POPULARDSC', '');
define('_MI_BIBLIOTECA_NEWDLS', 'Número de novos livros na pagina principal');
define('_MI_BIBLIOTECA_NEWDLSDSC', '');
define('_MI_BIBLIOTECA_PERPAGE', 'Número de livros por pagina');
define('_MI_BIBLIOTECA_PERPAGEDSC', '');
define('_MI_BIBLIOTECA_SUBCATPARENT', 'Número de subcategorias à exibir na categoria principal');
define('_MI_BIBLIOTECA_SUBCATPARENTDSC', '');
define('_MI_BIBLIOTECA_BLDATE', 'Exibir os livros populares na página principal e categorias (resumo)?');
define('_MI_BIBLIOTECA_BLDATEDSC', '');
define('_MI_BIBLIOTECA_BLPOP', 'Exibir os livros mais votados na página principal e categorias (resumo)?');
define('_MI_BIBLIOTECA_BLPOPDSC', '');
define('_MI_BIBLIOTECA_BLRATING', 'Exibir os livros mais votados na página principal e categorias (resumo)?');
define('_MI_BIBLIOTECA_BLRATINGDSC', '');
define('_MI_BIBLIOTECA_NBBL', 'Número de livros à exibir no resumo?');
define('_MI_BIBLIOTECA_NBBLDSC', '');
define('_MI_BIBLIOTECA_LONGBL', 'Quantidade do título do resumo');
define('_MI_BIBLIOTECA_LONGBLDSC', '');
define('_MI_BIBLIOTECA_USETELLAFRIEND', 'Usar módulo Tellafriend para o link envie a um amigo?');
define('_MI_BIBLIOTECA_USETELLAFRIENDDSC', 'Você tem que instalar o módulo Tellafriend, a fim de usar esta opção');
define('_MI_BIBLIOTECA_USESHOTS', 'Usar logo ?');
define('_MI_BIBLIOTECA_USESHOTSDSC', '');
define('_MI_BIBLIOTECA_SHOTWIDTH', 'Altura do logo');
define('_MI_BIBLIOTECA_SHOTWIDTHDSC', '');
define('_MI_BIBLIOTECA_CHECKHOST', 'Bloquear download de livro direto ligando? (Sanguessuga) ?');
define('_MI_BIBLIOTECA_CHECKHOSTDSC', '');
define('_MI_BIBLIOTECA_REFERERS', 'Estes sites podem linkar diretamente ao seus arquivos. Separe cada um com |');
define('_MI_BIBLIOTECA_REFERERSDSC', '');
define('_MI_BIBLIOTECA_MIMETYPE', 'Extensões permitidos ');
define('_MI_BIBLIOTECA_MIMETYPE_DSC', 'Digite as extensões separado-os por uma |');
define('_MI_BIBLIOTECA_MAXUPLOAD_SIZE', 'Tamanho máximo do livro para envio');
define('_MI_BIBLIOTECA_MAXUPLOAD_SIZEDSC', '');
define('_MI_BIBLIOTECA_FORM_OPTIONS', 'Editor');
define('_MI_BIBLIOTECA_FORM_OPTIONSDSC', '');
define('_MI_BIBLIOTECA_TOPORDER', 'Como exibir os livros na pagina principal?');
define('_MI_BIBLIOTECA_TOPORDER1', 'Data (DESC)');
define('_MI_BIBLIOTECA_TOPORDER2', 'Data (CRESC)');
define('_MI_BIBLIOTECA_TOPORDER3', 'Notas (DESC)');
define('_MI_BIBLIOTECA_TOPORDER4', 'Notas (CRESC)');
define('_MI_BIBLIOTECA_TOPORDER5', 'Votos (DESC)');
define('_MI_BIBLIOTECA_TOPORDER6', 'Votos (CRESC)');
define('_MI_BIBLIOTECA_TOPORDER7', 'Title (DESC)');
define('_MI_BIBLIOTECA_TOPORDER8', 'Título (CRESC)');
define('_MI_BIBLIOTECA_TOPORDERDSC', '');
define('_MI_BIBLIOTECA_SEARCHORDER', 'Como exibir os livros na lista de arquivos?');
define('_MI_BIBLIOTECA_SEARCHORDERDSC', '');
define('_MI_BIBLIOTECA_PERPAGELISTE', 'Livros exibido na lista de arquivos');
define('_MI_BIBLIOTECA_PERPAGELISTEDSC', '');
define('_MI_BIBLIOTECA_AUTO_SUMMARY', 'Resumo automatico?');
define('_MI_BIBLIOTECA_AUTO_SUMMARYDSC', '');
define('_MI_BIBLIOTECA_SHOW_UPDATED', "Mostrar 'Atualizado' e 'Nova' imagem?");
define('_MI_BIBLIOTECA_SHOW_UPDATEDDSC', '');
define('_MI_BIBLIOTECA_PERMISSIONDOWNLOAD', "Selecione o tipo de permissão para 'Permissão baixar os livros'");
define('_MI_BIBLIOTECA_PERMISSIONDOWNLOADDSC', '');
define('_MI_BIBLIOTECA_PERMISSIONDOWNLOAD1', 'Permissão por categoria');
define('_MI_BIBLIOTECA_PERMISSIONDOWNLOAD2', 'Permissão por livro');
define('_MI_BIBLIOTECA_USEPAYPAL', "Use o botão 'Doar' do Paypal ");
define('_MI_BIBLIOTECA_USEPAYPALDSC', '');
define('_MI_BIBLIOTECA_CURRENCYPAYPAL', 'Moeda Doação');
define('_MI_BIBLIOTECA_CURRENCYPAYPALDSC', '');
define('_MI_BIBLIOTECA_IMAGEPAYPAL', "Imagem do botão 'faça uma doação'");
define('_MI_BIBLIOTECA_IMAGEPAYPALDSC', 'Por favor, indique o endereço da imagem');
//new 1.1
define('_MI_BIBLIOTECA_PLATEFORM', 'Formato');
define('_MI_BIBLIOTECA_PLATEFORM_DSC', 'Digite o formato separando-as por uma |');
define('_MI_BIBLIOTECA_PERPAGEADMIN', 'Número de livros por página na administração');
define('_MI_BIBLIOTECA_PERPAGEADMINDSC', '');
define('_MI_BIBLIOTECA_DOWNLOAD_NAME', 'Renomear livros enviados?');
define('_MI_BIBLIOTECA_DOWNLOAD_NAMEDSC', 'Se a opção for "não" e existir uma arquivo com um mesmo nome no servidor, ele será substituído');
define('_MI_BIBLIOTECA_DOWNLOAD_PREFIX', 'Prefixo dos livros enviados');
define('_MI_BIBLIOTECA_DOWNLOAD_PREFIXDSC', 'Só é válido se a opção de renomear os arquivos enviados for "sim";');
define('_MI_BIBLIOTECA_USETAG', 'Usar o módulo TAG para genciar as tags');
define('_MI_BIBLIOTECA_USETAGDSC', 'Você prescisa instalar o módulo TAG para usar opção.');

// Notifications
define('_MI_BIBLIOTECA_GLOBAL_NOTIFY', 'Global');
define('_MI_BIBLIOTECA_GLOBAL_NOTIFYDSC', 'Opções global de notificação.');
define('_MI_BIBLIOTECA_CATEGORY_NOTIFY', 'Categoria');
define('_MI_BIBLIOTECA_CATEGORY_NOTIFYDSC', 'As opções de notificação se aplicam à categoria do livro atual.');
define('_MI_BIBLIOTECA_FILE_NOTIFY', 'Livro');
define('_MI_BIBLIOTECA_FILE_NOTIFYDSC', 'As opções de notificação se aplicam livro atual.');
define('_MI_BIBLIOTECA_GLOBAL_NEWCATEGORY_NOTIFY', 'Nova Categoria');
define('_MI_BIBLIOTECA_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Avise-me quando uma nova categoria for criada.');
define('_MI_BIBLIOTECA_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receber notificação quando uma categoria é criada');
define('_MI_BIBLIOTECA_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-notificar: Nova categoria de livros');
define('_MI_BIBLIOTECA_GLOBAL_FILEMODIFY_NOTIFY', 'Modificar arquivo solicitado');
define('_MI_BIBLIOTECA_GLOBAL_FILEMODIFY_NOTIFYCAP', 'Notifique-me de qualquer pedido de atualização de algum livro.');
define('_MI_BIBLIOTECA_GLOBAL_FILEMODIFY_NOTIFYDSC', 'Receber notificação quando o pedido de atualização de algum livro for enviado.');
define('_MI_BIBLIOTECA_GLOBAL_FILEMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-notificar: Arquivo alteração solicitada');
define('_MI_BIBLIOTECA_GLOBAL_FILEBROKEN_NOTIFY', 'Informação de livro corrompido enviado');
define('_MI_BIBLIOTECA_GLOBAL_FILEBROKEN_NOTIFYCAP', 'Notificar quando alguem informar um livro corrompido');
define('_MI_BIBLIOTECA_GLOBAL_FILEBROKEN_NOTIFYDSC', 'Receber notificação quando um alguem informar que existe livros corrompidos');
define('_MI_BIBLIOTECA_GLOBAL_FILEBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-notificar quando alguem informar um livro corrompido ');
define('_MI_BIBLIOTECA_GLOBAL_FILESUBMIT_NOTIFY', 'Livro enviado');
define('_MI_BIBLIOTECA_GLOBAL_FILESUBMIT_NOTIFYCAP', 'Notifique-me quando um novo livro for enviado (aguardando aprovação).');
define('_MI_BIBLIOTECA_GLOBAL_FILESUBMIT_NOTIFYDSC', 'Receber notificação quando um novo livro for enviado (aguardando aprovação).');
define('_MI_BIBLIOTECA_GLOBAL_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-notificar quando um livro for enviado');
define('_MI_BIBLIOTECA_GLOBAL_NEWFILE_NOTIFY', 'Novo livro');
define('_MI_BIBLIOTECA_GLOBAL_NEWFILE_NOTIFYCAP', 'Notifique-me quando um novo livro for postado.');
define('_MI_BIBLIOTECA_GLOBAL_NEWFILE_NOTIFYDSC', 'Receber notificação quando um novo livro for postado.');
define('_MI_BIBLIOTECA_GLOBAL_NEWFILE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-notificar: Novo livro');
define('_MI_BIBLIOTECA_CATEGORY_FILESUBMIT_NOTIFY', 'Livro Enviado');
define('_MI_BIBLIOTECA_CATEGORY_FILESUBMIT_NOTIFYCAP', 'Avise-me quando um novo livro for enviado (aguardando aprovação) para a categoria atual.');
define('_MI_BIBLIOTECA_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Receber notificação quando um novo livro for enviado (aguardando aprovação) para a categoria atual.');
define('_MI_BIBLIOTECA_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Novo livro enviado para categoria');
define('_MI_BIBLIOTECA_CATEGORY_NEWFILE_NOTIFY', 'Novo livro');
define('_MI_BIBLIOTECA_CATEGORY_NEWFILE_NOTIFYCAP', 'Avise-me quando um novo livro for colocada na categoria atual.');
define('_MI_BIBLIOTECA_CATEGORY_NEWFILE_NOTIFYDSC', 'Receber notificação quando um novo livro for colocada na categoria atual.');
define('_MI_BIBLIOTECA_CATEGORY_NEWFILE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Novo livro na categoria');
define('_MI_BIBLIOTECA_FILE_APPROVE_NOTIFY', 'Livro aprovado');
define('_MI_BIBLIOTECA_FILE_APPROVE_NOTIFYCAP', 'Notifique-me quando este livro for aprovado.');
define('_MI_BIBLIOTECA_FILE_APPROVE_NOTIFYDSC', 'Receber notificação quando este livro for aprovado.');
define('_MI_BIBLIOTECA_FILE_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-notificar: Livro Aprovado');
