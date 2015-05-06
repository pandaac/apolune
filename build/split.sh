git subsplit init git@github.com:pandaac/apolune.git
git subsplit publish --heads="master" src/Apolune/Core:git@github.com:apolune/core.git
git subsplit publish --heads="master" src/Apolune/Account:git@github.com:apolune/account.git
git subsplit publish --heads="master" src/Apolune/Library:git@github.com:apolune/library.git
rm -rf .subsplit/