# Vanderbilt
## Github Most Starred Public Repos Retrieved Through Github API using OOP PHP and PHP's Curl Function. Each time you go to the Page it retrieves the List via the Github API. So therefore the list will always be updated.

-Used the Github API to retrieve the Most Starred Public PHP Projects.
-The Page "index2.php" retrieves the Most Starred Public PHP Repos from the GitHub API, displays them in A Bootstrap Responsive Table, then Updates the MySQL DataBase. By Default only 30 records are printed to the screen. You could add more using the parameter named per page however we decided to leave it a the default for purposes of this exercise.

- On Page index2.php, If you click on Details you will be taken to an Interface page named "repoView.php" that retrieves the MySQL Stored Information for the Most Starred PHP Repo and Displays it to the screen. 

## Additionally, it will retrieve the Repo Owner's information using the GitHub API. That information will be printed at the bottom of the screen from a foreach loop.
###################################################################################################################################


## In This Project we decided to take on the challege of using cURL instead of the PHP GitHub PHP OOP wrappers they have. We used cURL and set its options to connect to GitHub's API via PHP OOP Classes instead of within the terminal.

## There are two pages (index2.php, repoView.php) and one sql script (Repository.sql) to recreate the Database.

## If you would like to get this working on your own you will need an GitHUB account so that you can authenticate. I used the Personal Access Token which you will need to setup within your GitHub profile. 

## The File I am uploading is name PAT_EXAMPLE_FILE.php, however I have taken out my login credentials.

-Tested and Working. See it Live at https://datalyticsbi.com/star-repos/index2.php

