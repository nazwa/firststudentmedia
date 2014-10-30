First Student Media
=================

Disclaimer
------
This is a **playground project** used while learning PhalconPHP years ago. The **code quality is terrible**, but maybe someone will find a use for it :) 

Demo
------
http://firststudentmedia.com (articles are from around February 2014)

What is it
===========
In short, it's a RSS feed aggregator, which collects articles from given feeds and tries to group them together into filterable categories.

It also uses **[Cosine similarity](http://en.wikipedia.org/wiki/Cosine_similarity)** to find similar articles. Imagine a big story covered by 10 newspapers. Clicking on one should show the other 9 as 'similar'.

How to use it
=========
1. Save *config.sample.php* as *config.php* and put the appropriate settings in
2. Run migrations to set up the database using phalcon dev tools *phalcon migration run*
3. Enjoy

Table sources should contain direct links to RSS feeds that you want to read. Don't forget to put some useful categories in as well, such as Sport, news, fashion etc

There is a command line task, which you can use with cron / manually to update the feed **php app/cli.php**



