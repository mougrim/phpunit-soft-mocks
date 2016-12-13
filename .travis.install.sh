#!/usr/bin/env bash
# create cache dir for soft-mocks
[ -d /tmp/mocks/ ] || mkdir /tmp/mocks/

XDEBUG_INI="/home/travis/.phpenv/versions/$(phpenv version-name)/etc/conf.d/xdebug.ini"
if [ -f "$XDEBUG_INI" ]; then
  echo 'remove xdebug config'
  phpenv config-rm xdebug.ini
else
  echo "xdebug config isn't exists"
fi
