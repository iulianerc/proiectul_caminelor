#!/bin/bash

TEMPLATE=$(cat scaffolding/api/stub/migration.stub)

FILLED_TEMPLATE=$(echo "$TEMPLATE" | sed -r "s/\{\{MODULE\}\}/$1/g")

LOWER_CASE_MODULES_NAME="${2,,}"
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{MODULES\}\}/$LOWER_CASE_MODULES_NAME/g")

TIMESTAMP=$(date +%Y_%m_%d_%N);

echo "$FILLED_TEMPLATE" > "$3"/"$TIMESTAMP"_create_"$LOWER_CASE_MODULES_NAME"_table.php
