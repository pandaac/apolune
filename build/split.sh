git subsplit init git@github.com:pandaac/apolune.git
git subsplit publish --heads="master" src/Apolune/core:git@github.com:Apolune/core.git
git subsplit publish --heads="master" src/Apolune/account:git@github.com:Apolune/account.git
rm -rf .subsplit/