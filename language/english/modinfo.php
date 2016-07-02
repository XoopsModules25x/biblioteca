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
define('_MI_BIBLIOTECA_NAME', 'Library');

// Description du module
define('_MI_BIBLIOTECA_DESC', 'Create a download section where users can download / send / classify various files.');

// Bloc
define('_MI_BIBLIOTECA_BNAME1', 'New Books');
define('_MI_BIBLIOTECA_BNAMEDSC1', 'Displays the books that have been added recently');
define('_MI_BIBLIOTECA_BNAME2', 'Book most popular');
define('_MI_BIBLIOTECA_BNAMEDSC2', 'Displays the most downloaded books');
define('_MI_BIBLIOTECA_BNAME3', 'Books highest rated');
define('_MI_BIBLIOTECA_BNAMEDSC3', 'Shows top rated books');
define('_MI_BIBLIOTECA_BNAME4', 'Books RANDOM');
define('_MI_BIBLIOTECA_BNAMEDSC4', 'Displays books randomly');

// Sous menu
define('_MI_BIBLIOTECA_SMNAME1', 'Submit book');
define('_MI_BIBLIOTECA_SMNAME2', 'Book List');

// Menu administration
define('_MI_BIBLIOTECA_ADMENU1', 'Home');
define('_MI_BIBLIOTECA_ADMENU2', 'Categories');
define('_MI_BIBLIOTECA_ADMENU3', 'Books');
define('_MI_BIBLIOTECA_ADMENU4', 'Books Corrupted');
define('_MI_BIBLIOTECA_ADMENU5', 'Books Upgraded');
define('_MI_BIBLIOTECA_ADMENU6', 'Manage Fields');
define('_MI_BIBLIOTECA_ADMENU7', 'About');
define('_MI_BIBLIOTECA_ADMENU8', 'Permissions');
define('_MI_BIBLIOTECA_ADMENU9', 'Update Module');
define('_MI_BIBLIOTECA_ADMENU10', 'Import');

// PREFERENCES
define('_MI_BIBLIOTECA_POPULAR', 'Number of downloaded books to be considered popular');
define('_MI_BIBLIOTECA_POPULARDSC', '');
define('_MI_BIBLIOTECA_NEWDLS', 'Number of new books on the main page');
define('_MI_BIBLIOTECA_NEWDLSDSC', '');
define('_MI_BIBLIOTECA_PERPAGE', 'Number of books per page');
define('_MI_BIBLIOTECA_PERPAGEDSC', '');
define('_MI_BIBLIOTECA_SUBCATPARENT', 'Number of subcategories to display in the main category');
define('_MI_BIBLIOTECA_SUBCATPARENTDSC', '');
define('_MI_BIBLIOTECA_BLDATE', 'View popular books on the homepage and categories (Summary)?');
define('_MI_BIBLIOTECA_BLDATEDSC', '');
define('_MI_BIBLIOTECA_BLPOP', 'View the top rated books on the homepage and categories (Summary)?');
define('_MI_BIBLIOTECA_BLPOPDSC', '');
define('_MI_BIBLIOTECA_BLRATING', 'View the top rated books on the homepage and categories (Summary)?');
define('_MI_BIBLIOTECA_BLRATINGDSC', '');
define('_MI_BIBLIOTECA_NBBL', 'Number of books to display in the summary?');
define('_MI_BIBLIOTECA_NBBLDSC', '');
define('_MI_BIBLIOTECA_LONGBL', 'Title Quantity summary');
define('_MI_BIBLIOTECA_LONGBLDSC', '');
define('_MI_BIBLIOTECA_USETELLAFRIEND', 'Use Tellafriend module to link send to a friend?');
define('_MI_BIBLIOTECA_USETELLAFRIENDDSC', 'You have to install Tellafriend module in order to use this option');
define('_MI_BIBLIOTECA_USESHOTS', 'Use right?');
define('_MI_BIBLIOTECA_USESHOTSDSC', '');
define('_MI_BIBLIOTECA_SHOTWIDTH', 'Logo height');
define('_MI_BIBLIOTECA_SHOTWIDTHDSC', '');
define('_MI_BIBLIOTECA_CHECKHOST', 'Block book direct download calling (Leech)?');
define('_MI_BIBLIOTECA_CHECKHOSTDSC', '');
define('_MI_BIBLIOTECA_REFERERS', 'These sites can link directly to your files Separate each with |.');
define('_MI_BIBLIOTECA_REFERERSDSC', '');
define('_MI_BIBLIOTECA_MIMETYPE', 'Allowed Extensions');
define('_MI_BIBLIOTECA_MIMETYPE_DSC', 'Enter the extensions separate them by a |');
define('_MI_BIBLIOTECA_MAXUPLOAD_SIZE', 'Maximum size of the book to submit');
define('_MI_BIBLIOTECA_MAXUPLOAD_SIZEDSC', '');
define('_MI_BIBLIOTECA_FORM_OPTIONS', 'Editor');
define('_MI_BIBLIOTECA_FORM_OPTIONSDSC', '');
define('_MI_BIBLIOTECA_TOPORDER', 'How to display books on the main page?');
define('_MI_BIBLIOTECA_TOPORDER1', 'Date (DESC)');
define('_MI_BIBLIOTECA_TOPORDER2', 'Date (up)');
define('_MI_BIBLIOTECA_TOPORDER3', 'Notes (DESC)');
define('_MI_BIBLIOTECA_TOPORDER4', 'Notes (up)');
define('_MI_BIBLIOTECA_TOPORDER5', 'Votes (DESC)');
define('_MI_BIBLIOTECA_TOPORDER6', 'Votes (up)');
define('_MI_BIBLIOTECA_TOPORDER7', 'Title (DESC)');
define('_MI_BIBLIOTECA_TOPORDER8', 'Title (up)');
define('_MI_BIBLIOTECA_TOPORDERDSC', '');
define('_MI_BIBLIOTECA_SEARCHORDER', 'How to display the books in the file list?');
define('_MI_BIBLIOTECA_SEARCHORDERDSC', '');
define('_MI_BIBLIOTECA_PERPAGELISTE', 'Books displayed in the file list');
define('_MI_BIBLIOTECA_PERPAGELISTEDSC', '');
define('_MI_BIBLIOTECA_AUTO_SUMMARY', 'Automatic summary?');
define('_MI_BIBLIOTECA_AUTO_SUMMARYDSC', '');
define('_MI_BIBLIOTECA_SHOW_UPDATED', "Show 'Updated' and 'New' image?");
define('_MI_BIBLIOTECA_SHOW_UPDATEDDSC', '');
define('_MI_BIBLIOTECA_PERMISSIONDOWNLOAD', "Select the type of permission for 'permission to download the books'");
define('_MI_BIBLIOTECA_PERMISSIONDOWNLOADDSC', '');
define('_MI_BIBLIOTECA_PERMISSIONDOWNLOAD1', 'Permission for category');
define('_MI_BIBLIOTECA_PERMISSIONDOWNLOAD2', 'Permission for book');
define('_MI_BIBLIOTECA_USEPAYPAL', 'Use the "Donate" button Paypal ');
define('_MI_BIBLIOTECA_USEPAYPALDSC', '');
define('_MI_BIBLIOTECA_CURRENCYPAYPAL', ' Currency of Donation');
define('_MI_BIBLIOTECA_CURRENCYPAYPALDSC', '');
define('_MI_BIBLIOTECA_IMAGEPAYPAL', "Button image 'make a donation'");
define('_MI_BIBLIOTECA_IMAGEPAYPALDSC', 'Please enter the address of the image');
// New 1.1
define('_MI_BIBLIOTECA_PLATEFORM', 'Format');
define('_MI_BIBLIOTECA_PLATEFORM_DSC', 'Enter the format separating them by a |');
define('_MI_BIBLIOTECA_PERPAGEADMIN', 'number of books per page in the administration');
define('_MI_BIBLIOTECA_PERPAGEADMINDSC', '');
define('_MI_BIBLIOTECA_DOWNLOAD_NAME', 'Rename books sent?');
define('_MI_BIBLIOTECA_DOWNLOAD_NAMEDSC', 'If the option is "no" and there is a file with the same name on the server, it will be replaced');
define('_MI_BIBLIOTECA_DOWNLOAD_PREFIX', 'Prefix of books sent');
define('_MI_BIBLIOTECA_DOWNLOAD_PREFIXDSC', 'It is only valid if the option to rename uploaded files is "yes"');
define('_MI_BIBLIOTECA_USETAG', 'Use the TAG module for genciar tags');
define('_MI_BIBLIOTECA_USETAGDSC', 'You prescisa install TAG module to use option.');

// Notifications
define('_MI_BIBLIOTECA_GLOBAL_NOTIFY', 'Global');
define('_MI_BIBLIOTECA_GLOBAL_NOTIFYDSC', 'global options of notification.');
define('_MI_BIBLIOTECA_CATEGORY_NOTIFY', 'Category');
define('_MI_BIBLIOTECA_CATEGORY_NOTIFYDSC', 'Notification options apply to the category of the current book.');
define('_MI_BIBLIOTECA_FILE_NOTIFY', 'Book');
define('_MI_BIBLIOTECA_FILE_NOTIFYDSC', 'Notification options current book apply.');
define('_MI_BIBLIOTECA_GLOBAL_NEWCATEGORY_NOTIFY', 'New Category');
define('_MI_BIBLIOTECA_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notify me when a new category is created.');
define('_MI_BIBLIOTECA_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receive notification when a category is created');
define('_MI_BIBLIOTECA_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}]} {X_MODULE Auto notify: New category of books');
define('_MI_BIBLIOTECA_GLOBAL_FILEMODIFY_NOTIFY', 'Modify requested file');
define('_MI_BIBLIOTECA_GLOBAL_FILEMODIFY_NOTIFYCAP', 'Notify me of any request to update a book.');
define('_MI_BIBLIOTECA_GLOBAL_FILEMODIFY_NOTIFYDSC', 'Receive notification when the update request of a book is sent.');
define('_MI_BIBLIOTECA_GLOBAL_FILEMODIFY_NOTIFYSBJ', '[{X_SITENAME}]} {X_MODULE Auto notify: requested change file');
define('_MI_BIBLIOTECA_GLOBAL_FILEBROKEN_NOTIFY', 'Book Information corrupted sent');
define('_MI_BIBLIOTECA_GLOBAL_FILEBROKEN_NOTIFYCAP', 'Notify me when someone enter a corrupted book');
define('_MI_BIBLIOTECA_GLOBAL_FILEBROKEN_NOTIFYDSC', 'Receive notification when a someone inform you that there is corrupted books');
define('_MI_BIBLIOTECA_GLOBAL_FILEBROKEN_NOTIFYSBJ', '[{X_SITENAME}]} {X_MODULE Auto notify when someone enter a corrupted book');
define('_MI_BIBLIOTECA_GLOBAL_FILESUBMIT_NOTIFY', 'Book sent');
define('_MI_BIBLIOTECA_GLOBAL_FILESUBMIT_NOTIFYCAP', 'Notify me when a new book is submitted (awaiting approval).');
define('_MI_BIBLIOTECA_GLOBAL_FILESUBMIT_NOTIFYDSC', 'Receive notification when a new book is submitted (awaiting approval).');
define('_MI_BIBLIOTECA_GLOBAL_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}]} {X_MODULE Auto notify when a book is sent');
define('_MI_BIBLIOTECA_GLOBAL_NEWFILE_NOTIFY', 'New Book');
define('_MI_BIBLIOTECA_GLOBAL_NEWFILE_NOTIFYCAP', 'Notify me when a new book is posted.');
define('_MI_BIBLIOTECA_GLOBAL_NEWFILE_NOTIFYDSC', 'Receive notification when a new book is posted.');
define('_MI_BIBLIOTECA_GLOBAL_NEWFILE_NOTIFYSBJ', '[{X_SITENAME}]} {X_MODULE Self notify: New Book');
define('_MI_BIBLIOTECA_CATEGORY_FILESUBMIT_NOTIFY', 'Book Sent');
define('_MI_BIBLIOTECA_CATEGORY_FILESUBMIT_NOTIFYCAP', 'Notify me when a new book is submitted (awaiting approval) to the current category.');
define('_MI_BIBLIOTECA_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Receive notification when a new book is submitted (awaiting approval) to the current category.');
define('_MI_BIBLIOTECA_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}]} {X_MODULE self-notify: New book sent to category');
define('_MI_BIBLIOTECA_CATEGORY_NEWFILE_NOTIFY', 'New Book');
define('_MI_BIBLIOTECA_CATEGORY_NEWFILE_NOTIFYCAP', 'Notify me when a new book is placed in the current category.');
define('_MI_BIBLIOTECA_CATEGORY_NEWFILE_NOTIFYDSC', 'Receive notification when a new book is placed in the current category.');
define('_MI_BIBLIOTECA_CATEGORY_NEWFILE_NOTIFYSBJ', '[{X_SITENAME}]} {X_MODULE new book in the category');
define('_MI_BIBLIOTECA_FILE_APPROVE_NOTIFY', 'approved Book');
define('_MI_BIBLIOTECA_FILE_APPROVE_NOTIFYCAP', 'Notify me when this book is approved.');
define('_MI_BIBLIOTECA_FILE_APPROVE_NOTIFYDSC', 'Notify me when this book is approved.');
define('_MI_BIBLIOTECA_FILE_APPROVE_NOTIFYSBJ', '[{X_SITENAME}]} {X_MODULE Auto notify: Book Approved');
