#!/bin/bash

# Converting an array to PhpDoc annotations

# Properties annotations
function makeProperties() {
    local field=""
    local name=""
    local type=""
    local separator="$1"
    shift

    local array=("$@")
    local annotations=""

    for INDEX in "${!array[@]}"; do
        field=${array[$INDEX]}
        name="${field%$separator*}"
        type="${field#*$separator}"
        annotations="$annotations * @property $type \$$name\n"
    done

    echo "${annotations%??}"
}
