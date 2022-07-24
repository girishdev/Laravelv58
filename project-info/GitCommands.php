git status

git checkout status

git pull origin master

git checkout -b kumar
git push -u kumar
git status

git add file.php

git commit -m "Taken DB Bkp and Other code"
git commit -m "Added OOP Concepts into git"
git push origin master

If you want to Remove Git Folder which are commited to Git
    git rm -r --cached vendor
    git rm -r --cached storage
    git rm -r --cached public

    git rm -r --cached project-info/db.bkp/05July2022-1.bkp

---------------------------------
Quick setup — if you’ve done this kind of thing before
or  
https://github.com/girishdev/Laravelv58.git
Get started by creating a new file or uploading an existing file. We recommend every repository include a README, LICENSE, and .gitignore.

…or create a new repository on the command line
echo "# Laravelv58" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/girishdev/Laravelv58.git
git push -u origin main
…or push an existing repository from the command line
git remote add origin https://github.com/girishdev/Laravelv58.git
git branch -M main
git push -u origin main
---------------------------------