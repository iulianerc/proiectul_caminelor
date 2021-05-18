#!/bin/bash

TEMPLATE=$(cat scaffolding/api/stub/seeder.stub)

FILLED_TEMPLATE=$(echo "$TEMPLATE" | sed -r "s/\{\{MODULES\}\}/$2/g")

LOWER_CASE_MODULE="${1,,}"
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{LOWER_CASE_MODULE\}\}/$LOWER_CASE_MODULE/g")

LOWER_CASE_MODULES="${2,,}"
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{LOWER_CASE_MODULES\}\}/$LOWER_CASE_MODULES/g")

echo "$FILLED_TEMPLATE" > "$3"/"$1"TableSeeder.php