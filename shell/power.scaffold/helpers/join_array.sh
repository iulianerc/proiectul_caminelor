#!/bin/bash

# Joins an array with specified separator
function join() {
  local separator="$1"
  shift

  local array=("$@")
  shift

  printf %s $array "${@/#/$separator}"
}
