#!/bin/bash

TEMPLATE=$(cat scaffolding/api/stub/form.stub)

FILLED_TEMPLATE=$(echo "$TEMPLATE" | sed -r "s/\{\{MODULE\}\}/$1/g")

mkdir -p "$3"/"$1"
echo "$FILLED_TEMPLATE" > "$3"/"$1"/"$1"Form.php