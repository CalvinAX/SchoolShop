#!/bin/bash

cd /home/user/www/shop/SchoolShop/SchoolShop
while true ; do
      if [[ -f GITPULLMASTER ]] ; then
            git pull > gitpull.log 2>&1
            mv GITPULLMASTER GITPULLMASTER.`date +"%Y%m%d%H%M%S"`
      fi
      sleep 10
done
