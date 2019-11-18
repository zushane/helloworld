FROM        perl:5.30.0

LABEL       maintainer="shane doucette <sd@zu.com>"

RUN         cpam Module::Build Test::More

