#! /usr/bin/env sh

# This script is run AFTER the packages are installed (npm-scripts install)

fromgithubinstall() {
  rm -rf "node_modules/${1}"
  mkdir "node_modules/${1}"
  curl -Ls "https://github.com/${2}/tarball/${3}" | tar zx -C "node_modules/${1}" --strip-components 1
  echo "✓ ${1} installed."
}

directinstall() {
  rm -rf "node_modules/${1}"
  mkdir "node_modules/${1}"
  cd "node_modules/${1}"
  if ! curl --fail -LsO "{$2}"; then
    rm -rf "node_modules/${1}"
    echo "✗ ${1} was not installed correctly."
    exit 1;
  fi
  cd ../..
  echo "✓ ${1} installed."
}

fromgithubinstall bxslider wandoledzep/bxslider-4 798eda1d14b108d8be8f0ab3ec2a2fb4a41ed6d7
fromgithubinstall jquery-easytabs JangoSteve/jquery-easytabs v3.2.0
fromgithubinstall jquery-easing gdsmith/jquery.easing 1.3.1
fromgithubinstall jquery-scrollstop ssorallen/jquery-scrollstop v1.1.0

#
# See: http://qtip2.com/download
#
# jsDelivr CDN (preferred) :
#
# http://cdn.jsdelivr.net/qtip2/2.2.0/jquery.qtip.js
# http://cdn.jsdelivr.net/qtip2/2.2.0/jquery.qtip.css
#
# CloudFlare CDN :
#
# http://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.0/jquery.qtip.js
# http://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.0/jquery.qtip.css
directinstall jquery-qtip2-js http://cdn.jsdelivr.net/qtip2/2.2.0/jquery.qtip.js
directinstall jquery-qtip2-css http://cdn.jsdelivr.net/qtip2/2.2.0/jquery.qtip.css
