This is an App on top of the MVC framework
New UI is added 

//commands

git add . 
git status
git commit -m "Your message"

git push -u origin branch_name              [Push all data]
git log                                     [For all information]

//brnching 
git branch branch_name                      [creating a branch]
git checkout branch_name                    [switching to abranch]
git push -u origin branch_name
git branch -d branch_name                   [to delete a bracnh]

git push origin --delete branch_name        [to delete branch from remote]

//branching
git merge branch_name [need to checkout master firts]


//Config gt
git config --global user.name "Imran Khan"
git config --global user.email "imran.14k@live.com"

Create a new repository
git clone git@gitlab.com:imran-khan101/ems-school-management.git
cd ems-school-management
touch README.md
git add README.md
git commit -m "add README"
git push -u origin master

Existing folder
cd existing_folder
git init
git remote add origin git@gitlab.com:imran-khan101/ems-school-management.git
git add .
git commit -m "Initial commit"
git push -u origin master

Existing Git repository
cd existing_repo
git remote rename origin old-origin
git remote add origin git@gitlab.com:imran-khan101/ems-school-management.git
git push -u origin --all
git push -u origin --tags