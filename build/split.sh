git subsplit init git@github.com:pandaac/apolune.git
git subsplit publish --heads="master" src/Apolune/About:git@github.com:apolune/about.git
git subsplit publish --heads="master" src/Apolune/Account:git@github.com:apolune/account.git
git subsplit publish --heads="master" src/Apolune/Contracts:git@github.com:apolune/contracts.git
git subsplit publish --heads="master" src/Apolune/Core:git@github.com:apolune/core.git
git subsplit publish --heads="master" src/Apolune/Library:git@github.com:apolune/library.git
git subsplit publish --heads="master" src/Apolune/News:git@github.com:apolune/news.git
git subsplit publish --heads="master" src/Apolune/Server:git@github.com:apolune/server.git
git subsplit publish --heads="master" src/Apolune/Support:git@github.com:apolune/support.git
rm -rf .subsplit/