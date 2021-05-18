#!/bin/bash

source helpers/join_array.sh

# Add double quotes(`"`) for each array element and joins it(array) with coma
function doubleQuoteAndJoin() {
  local array=("$@")
  local quotedArray=()

  for FIELD in "${!array[@]}"; do
    quotedArray+=("\"${array[$FIELD]}\"")
  done

  join "," "${quotedArray[@]}"
}
