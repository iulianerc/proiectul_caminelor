#!/bin/bash

# Returns only array keys using separator
function getOnlyKeys() {
    local field=""
    local separator="$1"
    shift

    local array=("$@")
    local keys=()

    for INDEX in "${!array[@]}"; do
        field=${array[$INDEX]}
        keys+=("${field%$separator*}")
    done

    echo "${keys[@]}"
}
