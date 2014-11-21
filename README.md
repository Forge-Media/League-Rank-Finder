League-Tier-Checker
=======================

A PHP script which uses (Riot's API) to get a Summoner's League and return an appropriate league image such as, Bronze, Silver, Gold, Platinum, Diamond.

Instructions Overview
=============

1. Requires you to have a Riot API Key.
2. Populate the members array with your teams Suommoner Names.
3. Please note this script uses CRON. Please settup a cron-job to call this, ideally 24hr intervals.
4. Images are saved under 'members/summonername.jpg'

Depolyability
============
• Shared webhosting - Requires CRON (PHP)
• VPS - Requires CRON (PHP)
• Heroku - Requires Heroku Scheduler (CURL) (curl http://appname.herokuapp.com/script.php)

Contributors
============
* [Jeremy Paton](http://jeremypaton.com) - Main developer.
