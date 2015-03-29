git subsplit init git@github.com:pandaac/apolune.git
git subsplit publish --heads="master" src/Apolune/Core:git@github.com:apolune/core.git
git subsplit publish --heads="master" src/Apolune/Account:git@github.com:apolune/account.git
rm -rf .subsplit/