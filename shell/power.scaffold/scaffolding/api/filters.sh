#!/bin/bash

TEMPLATE=$(cat scaffolding/api/stub/filters.stub)

FILLED_TEMPLATE=$(echo "$TEMPLATE" | sed -r "s/\{\{MODULE\}\}/$1/g")

LOWER_CASE_MODULES="${2,,}"
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{LOWER_CASE_MODULES\}\}/$LOWER_CASE_MODULES/g")

mkdir -p "$3"/"$1"
echo "$FILLED_TEMPLATE" > "$3"/"$1"/"$1"Filter.php
