# <img align="center" src="img/sno.svg" width="70">&nbsp;&nbsp;adct
[![Build Status](https://img.shields.io/travis/ArtiomL/adct.svg)](https://travis-ci.org/ArtiomL/adct)
[![Releases](https://img.shields.io/github/release/ArtiomL/adct.svg)](https://github.com/ArtiomL/adct/releases)
[![Commits](https://img.shields.io/github/commits-since/ArtiomL/adct/v1.0.5.svg?label=commits%20since)](https://github.com/ArtiomL/adct/commits/master)
[![Maintenance](https://img.shields.io/maintenance/yes/2019.svg)](https://github.com/ArtiomL/adct/graphs/code-frequency)
[![Issues](https://img.shields.io/github/issues/ArtiomL/adct.svg)](https://github.com/ArtiomL/adct/issues)
[![Docker Hub](https://img.shields.io/docker/pulls/artioml/adct.svg)](https://hub.docker.com/r/artioml/adct/)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)

&nbsp;&nbsp;

## Table of Contents
- [Description](#description)
- [Installation](#installation)
	- [Main Site](#main-site)
	- [WebSocket Echo](#websocket-echo)
- [Service Tree](#service-tree)
- [Customization](#customization)
- [License](LICENSE)

&nbsp;&nbsp;

## Description

A small web app container for testing Application Delivery Controllers in lab environments.

&nbsp;&nbsp;

## Installation

#### Main Site
```shell
docker run -dit -p 80:8080 -p 443:8443 artioml/adct
```

Add a custom node name to the page title (supports HTML "Injection"):

```shell
docker run -dit -p 80:8080 -p 443:8443 -e NODE='<b>Node1</b>' artioml/adct
```

#### WebSocket Echo (`/ws/`)
```shell
docker run -dit -p 4433:4433 artioml/adct:ws
```

&nbsp;&nbsp;

## Service Tree
```
/
├── secure/
│   └── Basic Authentication (user:user)
├── uri[0-9]*/
│   └── Alias for DocumentRoot (/var/www/adct/)
└── ws/
    └── WebSocket Echo
```

&nbsp;&nbsp;

## Customization

Add custom CSS or JavaScript by mounting the `css/custom.css` and/or `js/custom.js` file(s) into the container instance. For example:

```
docker run -dit -p 80:8080 -p 443:8443 \
	-v /path/to/your.css:/var/www/adct/css/custom.css \
	-v /path/to/your.js:/var/www/adct/js/custom.js \
	artioml/adct
```
