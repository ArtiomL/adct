# adct:ws - Dockerfile
# https://github.com/ArtiomL/adct
# Artiom Lichtenstein
# v1.0.6, 03/08/2018

FROM alpine

LABEL maintainer="Artiom Lichtenstein" version="1.0.6"

# Core dependencies
RUN apk add --update --no-cache nodejs-npm && \
	rm -rf /var/cache/apk/*

# adct:ws
COPY / /opt/adct/ws/
WORKDIR /opt/adct/ws/
RUN npm install websocket --save

# Expose ports
EXPOSE 4433

# UID to use when running the image and for CMD
USER 1001

# Run
CMD ["/usr/bin/node", "server.js", "4433"]
