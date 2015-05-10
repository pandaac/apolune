git subsplit init git@github.com:pandaac/apolune.git
git subsplit publish --heads="master" src/Apolune/Account:git@github.com:apolune/account.git
git subsplit publish --heads="master" src/Apolune/Contracts:git@github.com:apolune/contracts.git
git subsplit publish --heads="master" src/Apolune/Core:git@github.com:apolune/core.git
git subsplit publish --heads="master" src/Apolune/Library:git@github.com:apolune/library.git
git subsplit publish --heads="master" src/Apolune/Server:git@github.com:apolune/server.git
rm -rf .subsplit/