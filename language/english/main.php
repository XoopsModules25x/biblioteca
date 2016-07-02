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

define('_MD_BIBLIOTECA_INDEX_BLDATE', 'Recent Books:');
define('_MD_BIBLIOTECA_INDEX_BLNAME', 'Summary');
define('_MD_BIBLIOTECA_INDEX_BLRATING', 'Books Popular');
define('_MD_BIBLIOTECA_INDEX_BLPOP', 'Books Top Downloads:');
define('_MD_BIBLIOTECA_INDEX_DLNOW', 'Download now!');
define('_MD_BIBLIOTECA_INDEX_LATESTLIST', 'Recent Books');
define('_MD_BIBLIOTECA_INDEX_NEWTHISWEEK', 'New this week');
define('_MD_BIBLIOTECA_INDEX_POPULAR', 'People');
define('_MD_BIBLIOTECA_INDEX_UPTHISWEEK', 'Updated this week');
define('_MD_BIBLIOTECA_INDEX_SCAT', 'Select a Category');
define('_MD_BIBLIOTECA_INDEX_SUBMITDATE', 'Posted on');
define('_MD_BIBLIOTECA_INDEX_SUBMITTER', 'Submitted by:');
define('_MD_BIBLIOTECA_INDEX_THEREARE', '<b>%s</b> books in our Database');

// viewcat.php:
define('_MD_BIBLIOTECA_CAT_CURSORTBY', 'Books currently sorted by:% s');
define('_MD_BIBLIOTECA_CAT_DATE', 'Date');
define('_MD_BIBLIOTECA_CAT_DATENEW', 'Date (Descending)');
define('_MD_BIBLIOTECA_CAT_DATEOLD', 'Date (Ascending)');
define('_MD_BIBLIOTECA_CAT_HITS', 'Visits');
define('_MD_BIBLIOTECA_CAT_LIST', 'List');
define('_MD_BIBLIOTECA_CAT_NONEXISTENT', 'This category does not exist');
define('_MD_BIBLIOTECA_CAT_POPULARITY', 'Popularity');
define('_MD_BIBLIOTECA_CAT_POPULARITYLTOM', 'Popularity (least downloaded first)');
define('_MD_BIBLIOTECA_CAT_POPULARITYMTOL', 'Popularity (most downloaded first)');
define('_MD_BIBLIOTECA_CAT_RATING', 'Rating');
define('_MD_BIBLIOTECA_CAT_RATINGLTOH', 'Rating (less evaluated first)');
define('_MD_BIBLIOTECA_CAT_RATINGHTOL', 'Rating (most valued first)');
define('_MD_BIBLIOTECA_CAT_SORTBY', 'Sort by:');
define('_MD_BIBLIOTECA_CAT_SUMMARY', 'Summary');
define('_MD_BIBLIOTECA_CAT_THEREARE', '<b>%s</b> books in this category');
define('_MD_BIBLIOTECA_CAT_TITLE', 'Title');
define('_MD_BIBLIOTECA_CAT_TITLEATOZ', 'Title (A to Z)');
define('_MD_BIBLIOTECA_CAT_TITLEZTOA', 'Title (Z to A)');
define('_MD_BIBLIOTECA_CAT_VOTE', 'Vote');

// singlefile.php:
define('_MD_BIBLIOTECA_SINGLEFILE_AUTHOR', 'Submitted by');
define('_MD_BIBLIOTECA_SINGLEFILE_COMMENTS', 'Comments (%s)');
define('_MD_BIBLIOTECA_SINGLEFILE_DATEPROP', 'Submitted on');
define('_MD_BIBLIOTECA_SINGLEFILE_ICI', 'Here WWW');
define('_MD_BIBLIOTECA_SINGLEFILE_INTFILEFOUND', 'Here is an important file %s');
define('_MD_BIBLIOTECA_SINGLEFILE_NBTELECH', '%s Downloads');
define('_MD_BIBLIOTECA_SINGLEFILE_NONEXISTENT', 'This book does not exist in our database');
define('_MD_BIBLIOTECA_SINGLEFILE_NOPERMDOWNLOAD', 'You are not allowed to download this book');
define('_MD_BIBLIOTECA_SINGLEFILE_MODIFY', 'Update');
define('_MD_BIBLIOTECA_SINGLEFILE_RATING', 'Assessment');
define('_MD_BIBLIOTECA_SINGLEFILE_RATHFILE', 'Rate this book');
define('_MD_BIBLIOTECA_SINGLEFILE_REPORTBROKEN', 'Report corrupted book');
define('_MD_BIBLIOTECA_SINGLEFILE_TELLAFRIEND', 'Tell a Friend');
define('_MD_BIBLIOTECA_SINGLEFILE_VOTES', '(Votes: %s)');
define('_MD_BIBLIOTECA_SINGLEFILE_PAYPAL', 'Donation to %s');

// ratefile.php
define('_MD_BIBLIOTECA_RATEFILE_BEOBJECTIVE', 'Please be objective, if everyone receives a 1 or a 10, the ratings are not very useful.');
define('_MD_BIBLIOTECA_RATEFILE_CANTVOTEOWN', 'Do not vote for your own book <br> All votes are counted and verified..');
define('_MD_BIBLIOTECA_RATEFILE_DONOTVOTE', 'Do not vote for your own book.');
define('_MD_BIBLIOTECA_RATEFILE_NORATING', 'The vote must be between 0 and 10');
define('_MD_BIBLIOTECA_RATEFILE_RATE', 'Validate vote!');
define('_MD_BIBLIOTECA_RATEFILE_RATINGSCALE', 'The scale is 1 - 10, with 1 being poor and 10 being excellent.');
define('_MD_BIBLIOTECA_RATEFILE_VOTE', 'Vote');
define('_MD_BIBLIOTECA_RATEFILE_VOTEOK', 'Thank you for your vote <br> Thank you for taking the time to vote here.');
define('_MD_BIBLIOTECA_RATEFILE_VOTEONCE', 'Please do not vote for the same book more than once.');

// brokenfile.php
define('_MD_BIBLIOTECA_BROKENFILE_ALREADYREPORTED', 'This book has been already reported as corrupt.');
define('_MD_BIBLIOTECA_BROKENFILE_FORSECURITY', 'For security reasons your username and IP address will be stored temporarily ....');
define('_MD_BIBLIOTECA_BROKENFILE_REPORTBROKEN', 'Report Corrupted Book');
define('_MD_BIBLIOTECA_BROKENFILE_THANKSFORHELP', 'Thank you for helping us to maintain the integrity of our books.');
define('_MD_BIBLIOTECA_BROKENFILE_THANKSFORINFO', 'Thanks for the information. We will soon review your request.');

// modfile.php
define('_MD_BIBLIOTECA_MODFILE_THANKSFORINFO', 'Thanks for the information. We will soon review your request.');

//submit.php
define('_MD_BIBLIOTECA_SUBMIT_ALLPENDING', 'All books are subject to moderation.');
define('_MD_BIBLIOTECA_SUBMIT_DONTABUSE', 'Your name and User IP is registered, please do not abuse the system.');
define('_MD_BIBLIOTECA_SUBMIT_ISAPPROVED', 'The book you sent was approved');
define('_MD_BIBLIOTECA_SUBMIT_PROPOSER', 'Send a book');
define('_MD_BIBLIOTECA_SUBMIT_RECEIVED', 'We received your book Thank you!');
define('_MD_BIBLIOTECA_SUBMIT_SUBMITONCE', 'Send your book only once.');
define('_MD_BIBLIOTECA_SUBMIT_TAKEDAYS', 'It might take a few days to see your book successfully added to our database.');

//search.php
define('_MD_BIBLIOTECA_SEARCH', 'Filter list in the module');
define('_MD_BIBLIOTECA_SEARCH_ALL1', 'All');
define('_MD_BIBLIOTECA_SEARCH_ALL2', 'All');
define('_MD_BIBLIOTECA_SEARCH_BT', 'Search');
define('_MD_BIBLIOTECA_SEARCH_CATEGORIES', 'Categories');
define('_MD_BIBLIOTECA_SEARCH_DATE', 'Date');
define('_MD_BIBLIOTECA_SEARCH_DOWNLOAD', 'Download');
define('_MD_BIBLIOTECA_SEARCH_HITS', 'Views');
define('_MD_BIBLIOTECA_SEARCH_NOTE', 'Rate');
define('_MD_BIBLIOTECA_SEARCH_PAGETITLE', 'Book List');
define('_MD_BIBLIOTECA_SEARCH_THEREARE', 'There are <b>%s </b> book(s)');
define('_MD_BIBLIOTECA_SEARCH_TITLE', 'Title');

// générique
define('_MD_BIBLIOTECA_EDITTHISDL', 'Edit information about this book');
define('_MD_BIBLIOTECA_MOREDETAILS', '>> more details');

//visit.php
define('_MD_BIBLIOTECA_NOPERMISETOLINK',
       'This book does not belong to the site where you are coming from!<br> <br> Please write an email to the administrator of the website  where you are coming from and tell him: <br> <b> NO FREELOADING OF LINKS FROM OTHER SITES! (LEECHING) </b> <br> <br> <b> Definition of Leeching: </b> Someone who is too lazy to create own content, and puts links on his own server to the hard work done by others pretending that it\'s his <br> <br> You and your Website are now <b> registered </b>. ');

// Message d'erreur
define('_MD_BIBLIOTECA_ERREUR_NOCAT', 'You have to choose a category!');
define('_MD_BIBLIOTECA_ERREUR_SIZE', 'File size must be a number');
