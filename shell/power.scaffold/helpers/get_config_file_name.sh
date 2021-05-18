#!/bin/bash

# Returns path to module config file
function getConfigFileName() {
  local MODULE_NAME="${1,,}"

  echo "modules/$MODULE_NAME.conf"
}
