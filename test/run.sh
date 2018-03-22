#!/bin/bash
# adct - Run Tests
# https://github.com/ArtiomL/adct
# Artiom Lichtenstein
# v1.0.0, 01/02/2018

set -xeo pipefail

REPO="artioml/adct"

docker run -dit -p 80:8080 -p 443:8443 $REPO
docker run -dit -p 4433:4433 $REPO:ws
docker ps -a
curl -s http://127.0.0.1/uri$(shuf -i 0-1313 -n 1)/index.php | grep 'hello, world'
curl -sk https://127.0.0.1/uri$(shuf -i 0-1313 -n 1)/secure/index.php -u user:user | grep 'hello, user'
echo 'hello, world' | wscat -s echo ws://127.0.0.1:4433 | grep 'hello, world'
