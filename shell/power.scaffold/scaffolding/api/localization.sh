#!/bin/bash

source helpers/get_only_keys.sh
source helpers/array_to_single_quoted_cs_string.sh

TEMPLATE=$(cat scaffolding/api/stub/localization.stub)

FILLED_TEMPLATE=$(echo "$TEMPLATE" | sed -r "s/\{\{MODULE\}\}/$1/g")

FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{MODULES\}\}/$2/g")

# Make fields list and fill `FIELDS` slot
KEYS=$(getOnlyKeys : "${@:4}")
FIELDS=$(singleQuoteAndJoin $KEYS)
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{FIELDS\}\}/$FIELDS/g")

LOWER_CASE_MODULES_NAME="${2,,}"

echo "$FILLED_TEMPLATE" > "$3"/"$LOWER_CASE_MODULES_NAME".php
