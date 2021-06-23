#! /usr/bin/env sh

# if [ -d "./node_modules" ]; then
#     mv "./node_modules" $(mktemp -d /tmp/node_modules.XXXXXX);
# fi

remove() {
  rm -rf "node_modules/${1}"
}

remove bxslider
remove colorbox
remove jquery-easytabs
remove jquery-easing
remove jquery-scrollstop
remove jquery-qtip2-js
remove jquery-qtip2-css
