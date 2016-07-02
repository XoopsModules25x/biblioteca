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
define('_AM_BIBLIOTECA_INDEX_BROKEN', "There are <b> <span style = 'color: red'>%s </span> </b> report (s) Corrupted Books");
define('_AM_BIBLIOTECA_INDEX_CHANGELOG', '<b> Changelog </b>');
define('_AM_BIBLIOTECA_INDEX_DOWNLOADS', "There are <b> <span style = 'color: red'>%s </span> </b> Book (s) in the database");
define('_AM_BIBLIOTECA_INDEX_DOWNLOADSWAITING', "There are <b> <span style = 'color: red'>%s </span> </b> Book (s) waiting for approval");
define('_AM_BIBLIOTECA_INDEX_ERREURFOLDER', "ERROR:' library 'directory'%s / uploads / 'can not be created, you have to create it manually <br> Just copy the' library 'folder (You can find it does the 'extra' directory module) in the 'upload directory' above ");
define('_AM_BIBLIOTECA_INDEX_ERREURPHP', 'ERROR:. This menu requires at least PHP 5.0 or higher');
define('_AM_BIBLIOTECA_INDEX_MODIFIED', "There are <b> <span style = 'color: red'>%s </span> </b> Book (s) with update requests");
define('_AM_BIBLIOTECA_INDEX_UPDATE_INFO', 'You are using the latest version of the library module');
define('_AM_BIBLIOTECA_INDEX_VERSION_ALLOWURLFOPEN', "To determine whether a new version of the library there, you should have 'allow_url_fopen' to 'on' in the server php.ini");
define('_AM_BIBLIOTECA_INDEX_VERSION_FICHIER_KO', 'The version management file library module is currently unavailable');
define('_AM_BIBLIOTECA_INDEX_VERSION_NOT_OK', "There is a new version of the library%s module, you can download <a href = 'http: //www.jequiehost.com/modules/TDMDownloads/viewcat.php cid = 1' target = '_ blank'> here </a> ");
define('_AM_BIBLIOTECA_INDEX_VERSION_OK', 'You are using the latest version of the library module%s');

//category.php
define('_AM_BIBLIOTECA_CAT_NEW', 'New Category');
define('_AM_BIBLIOTECA_CAT_LIST', 'List of category');
define('_AM_BIBLIOTECA_DELDOWNLOADS', 'with the following books:');
define('_AM_BIBLIOTECA_DELSOUSCAT', 'The following categories will be totally erased:');

//downloads.php
define('_AM_BIBLIOTECA_DOWNLOADS_LISTE', 'List of books');
define('_AM_BIBLIOTECA_DOWNLOADS_NEW', 'Send book');
define('_AM_BIBLIOTECA_DOWNLOADS_SEARCH', 'Search');
define('_AM_BIBLIOTECA_DOWNLOADS_VOTESANONYME', 'anonymous votes (total votes:%s)');
define('_AM_BIBLIOTECA_DOWNLOADS_VOTESUSER', 'Votes of users (total votes:%s)');
define('_AM_BIBLIOTECA_DOWNLOADS_VOTE_USER', 'Users');
define('_AM_BIBLIOTECA_DOWNLOADS_VOTE_IP', 'IP address');
define('_AM_BIBLIOTECA_DOWNLOADS_WAIT', 'Awaiting Approval');

//broken.php
define('_AM_BIBLIOTECA_BROKEN_SENDER', 'Contact the Author');
define('_AM_BIBLIOTECA_BROKEN_SURDEL', 'Are you sure you want to delete this message?');

//modified.php
define('_AM_BIBLIOTECA_MODIFIED_MOD', 'Submitted by;');
define('_AM_BIBLIOTECA_MODIFIED_ORIGINAL', 'Original');
define('_AM_BIBLIOTECA_MODIFIED_SURDEL', 'Are you sure you want to delete this order book update?');

//field.php
define('_AM_BIBLIOTECA_DELDATA', 'with the following:');
define('_AM_BIBLIOTECA_FIELD_LIST', 'field list');
define('_AM_BIBLIOTECA_FIELD_NEW', 'New Field');

//about.php
define('_AM_BIBLIOTECA_ABOUT_AUTHOR', 'Author');
define('_AM_BIBLIOTECA_ABOUT_CHANGELOG', 'Description of version');
define('_AM_BIBLIOTECA_ABOUT_CREDITS', 'credits');
define('_AM_BIBLIOTECA_ABOUT_FILEPROTECTION', 'Protected Files');
define('_AM_BIBLIOTECA_ABOUT_FILEPROTECTION_INFO1', "To protect your books from potentially unwanted downloads (compared with permissions), you have to create a '.htaccess'in the directory");
define('_AM_BIBLIOTECA_ABOUT_FILEPROTECTION_INFO2', 'with the following contents:');
define('_AM_BIBLIOTECA_ABOUT_LICENSE', 'License');
define('_AM_BIBLIOTECA_ABOUT_MODULEINFOS', 'Module Information');
define('_AM_BIBLIOTECA_ABOUT_MODULEWEBSITE', 'Support Website');
define('_AM_BIBLIOTECA_ABOUT_RELEASEDATE', 'Date of dispatch');
define('_AM_BIBLIOTECA_ABOUT_STATUS', 'status');

//permissions.php
define('_AM_BIBLIOTECA_PERMISSIONS_4', 'Send a book');
define('_AM_BIBLIOTECA_PERMISSIONS_8', 'Send updated book');
define('_AM_BIBLIOTECA_PERMISSIONS_16', 'evaluate the books');
define('_AM_BIBLIOTECA_PERMISSIONS_32', 'Send Books');
define('_AM_BIBLIOTECA_PERMISSIONS_64', 'Automatically approve the books sent');
define('_AM_BIBLIOTECA_PERM_AUTRES', 'Other permissions');
define('_AM_BIBLIOTECA_PERM_AUTRES_DSC', 'Select the groups you want to authorize:');
define('_AM_BIBLIOTECA_PERM_DOWNLOAD', 'Permissions for downloads');
define('_AM_BIBLIOTECA_PERM_DOWNLOAD_DSC', 'Select the groups that can download in the categories');
define('_AM_BIBLIOTECA_PERM_DOWNLOAD_DSC2', 'Select the groups that can download books');
define('_AM_BIBLIOTECA_PERM_SUBMIT', 'Permission to send');
define('_AM_BIBLIOTECA_PERM_SUBMIT_DSC', 'Choose the group (s) (s) that can send books to the categories');
define('_AM_BIBLIOTECA_PERM_VIEW', 'Access Permissions');
define('_AM_BIBLIOTECA_PERM_VIEW_DSC', 'Select the group (s) (s) that you can view the categories');

// import.php
define('_AM_BIBLIOTECA_IMPORT1', 'Import');
define('_AM_BIBLIOTECA_IMPORT_CAT_IMP', 'Categories %s import');
define('_AM_BIBLIOTECA_IMPORT_CONF_MYDOWNLOADS', 'Are you sure you want to import MyDownloads data to the library module');
define('_AM_BIBLIOTECA_IMPORT_CONF_WFDOWNLOADS', 'Are you sure you want to import WF-Downloads data to the library module');
define('_AM_BIBLIOTECA_IMPORT_DONT_DOWNLOADS', 'There are no files to import');
define('_AM_BIBLIOTECA_IMPORT_DONT_TOPIC', 'There are no files to import');
define('_AM_BIBLIOTECA_IMPORT_DOWNLOADS', 'Import files');
define('_AM_BIBLIOTECA_IMPORT_DOWNLOADS_IMP', "file:'%s' import; ");
define('_AM_BIBLIOTECA_IMPORT_ERREUR', 'Select Directory to upload (the path)');
define('_AM_BIBLIOTECA_IMPORT_ERROR_DATA', 'Error when importing data');
define('_AM_BIBLIOTECA_IMPORT_MYDOWNLOADS', 'Import MyDownloads');
define('_AM_BIBLIOTECA_IMPORT_MYDOWNLOADS_PATH', 'Select Directory to upload (the path) to screen shots of MyDownloads');
define('_AM_BIBLIOTECA_IMPORT_MYDOWNLOADS_URL', 'Choose the corresponding URL for screen shots of MyDownloads');
define('_AM_BIBLIOTECA_IMPORT_NB_CAT', 'There are%s categories for import');
define('_AM_BIBLIOTECA_IMPORT_NB_DOWNLOADS', 'There are%s files for import');
define('_AM_BIBLIOTECA_IMPORT_NUMBER', 'Data Import');
define('_AM_BIBLIOTECA_IMPORT_OK', 'Import successfully done !!!');
define('_AM_BIBLIOTECA_IMPORT_VOTE_IMP', "VOTES: '%s' import;");
define('_AM_BIBLIOTECA_IMPORT_WARNING',
       "<span style = 'color: # FF0000; font-size: 16px; font-weight: bold> Warning </span> <br> With imports will erase all data . library <br> is highly recommended that you make a backup of your data, also their <br> TDM site is not responsible if you lose your data. ");
define('_AM_BIBLIOTECA_IMPORT_WFDOWNLOADS', 'Import WF Downloads (only V3.2 RC2)');
define('_AM_BIBLIOTECA_IMPORT_WFDOWNLOADS_CATIMG', 'Select Directory to upload (the path) to the images of WF-Downloads the categories');
define('_AM_BIBLIOTECA_IMPORT_WFDOWNLOADS_SHOTS', 'Select Directory to upload (the path) for screenshots of the WF-Downloads');

// Pour les options de filtre
define('_AM_BIBLIOTECA_ORDER', 'Order');
define('_AM_BIBLIOTECA_TRIPAR', 'Ordered by:');

// Formulaire et tableau
define('_AM_BIBLIOTECA_FORMADD', 'Add');
define('_AM_BIBLIOTECA_FORMACTION', 'Action');
define('_AM_BIBLIOTECA_FORMAFFICHE', 'Display the field?');
define('_AM_BIBLIOTECA_FORMAFFICHESEARCH', 'Research in the field?');
define('_AM_BIBLIOTECA_FORMAPPROVE', 'Approve');
define('_AM_BIBLIOTECA_FORMCAT', 'Category');
define('_AM_BIBLIOTECA_FORMCOMMENTS', 'Number of comments');
define('_AM_BIBLIOTECA_FORMDATE', 'Date');
define('_AM_BIBLIOTECA_FORMDATEUPDATE', 'Update date?');
define('_AM_BIBLIOTECA_FORMDATEUPDATE_NO', 'No');
define('_AM_BIBLIOTECA_FORMDATEUPDATE_YES', 'Yes ->');
define('_AM_BIBLIOTECA_FORMDEL', 'Delete');
define('_AM_BIBLIOTECA_FORMDISPLAY', 'View');
define('_AM_BIBLIOTECA_FORMEDIT', 'Edit');
define('_AM_BIBLIOTECA_FORMFILE', 'Book');
define('_AM_BIBLIOTECA_FORMHITS', 'Downloads');
define('_AM_BIBLIOTECA_FORMHOMEPAGE', 'Home');
define('_AM_BIBLIOTECA_FORMLOCK', 'Disable download the book');
define('_AM_BIBLIOTECA_FORMIGNORE', 'Ignore');
define('_AM_BIBLIOTECA_FORMINCAT', 'In the category');
define('_AM_BIBLIOTECA_FORMIMAGE', 'Image');
define('_AM_BIBLIOTECA_FORMIMG', 'Soon');
define('_AM_BIBLIOTECA_FORMPAYPAL', 'Address to Paypal donation');
define('_AM_BIBLIOTECA_FORMPATH', 'Books in: %s');
define('_AM_BIBLIOTECA_FORMPLATFORM', 'Format');
define('_AM_BIBLIOTECA_FORMPOSTER', 'Published by');
define('_AM_BIBLIOTECA_FORMRATING', 'Note');
define('_AM_BIBLIOTECA_FORMSIZE', 'File Size in (bytes)');
define('_AM_BIBLIOTECA_FORMSTATUS', 'Download status');
define('_AM_BIBLIOTECA_FORMSTATUS_OK', 'Approved');
define('_AM_BIBLIOTECA_FORMSUBMITTER', 'Published by');
define('_AM_BIBLIOTECA_FORMSUREDEL', "Are you sure you want to delete: <b> <span style =' color: red '>%s </span> </b> ");
define('_AM_BIBLIOTECA_FORMTEXT', 'Description');
define('_AM_BIBLIOTECA_FORMTEXTDOWNLOADS', "Description: <br> Use the delimiter '<b> [pagebreak] </b>' Prefer uam short description <br> A brief description can reduce the size of text on the homepage. module and categories. ");
define('_AM_BIBLIOTECA_FORMTITLE', 'Title');
define('_AM_BIBLIOTECA_FORMUPLOAD', 'Upload');
define('_AM_BIBLIOTECA_FORMURL', 'Download URL');
define('_AM_BIBLIOTECA_FORMVALID', 'Enable download the book');
define('_AM_BIBLIOTECA_FORMVERSION', 'Version');
define('_AM_BIBLIOTECA_FORMVOTE', 'Votes');
define('_AM_BIBLIOTECA_FORMWEIGHT', 'Position');
define('_AM_BIBLIOTECA_FORMWITHFILE', 'With the book:');

// Message d'erreur
define('_AM_BIBLIOTECA_ERREUR_CAT', 'You can not use this category (looping about yourself)');
define('_AM_BIBLIOTECA_ERREUR_NOBMODDOWNLOADS', 'There is no updated book');
define('_AM_BIBLIOTECA_ERREUR_NOBROKENDOWNLOADS', 'There are books Corrupted');
define('_AM_BIBLIOTECA_ERREUR_NOCAT', 'You have to choose a category!');
define('_AM_BIBLIOTECA_ERREUR_NODESCRIPTION', 'You have to write the description');
define('_AM_BIBLIOTECA_ERREUR_NODOWNLOADS', 'You have not sent any book.');
define('_AM_BIBLIOTECA_ERREUR_SIZE', 'The file size must be a number');
define('_AM_BIBLIOTECA_ERREUR_WEIGHT', 'Your note should be a number');

// Message redirection
define('_AM_BIBLIOTECA_REDIRECT_DELOK', 'Off successfully!');
define('_AM_BIBLIOTECA_REDIRECT_NOCAT', 'You have to create a category');
define('_AM_BIBLIOTECA_REDIRECT_NODELFIELD', 'You can not delete this field (basic course)');
define('_AM_BIBLIOTECA_REDIRECT_SAVE', 'Bank data updated successfully!');
