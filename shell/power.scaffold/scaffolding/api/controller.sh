#!/bin/bash

TEMPLATE=$(cat scaffolding/api/stub/controller.stub)

FILLED_TEMPLATE=$(echo "$TEMPLATE" | sed -r "s/\{\{MODULE\}\}/$1/g")

LOWER_CASE_MODULE="${1,,}"
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{LOWER_CASE_MODULE\}\}/$LOWER_CASE_MODULE/g")

echo "$FILLED_TEMPLATE" > "$3"/"$1"Controller.php