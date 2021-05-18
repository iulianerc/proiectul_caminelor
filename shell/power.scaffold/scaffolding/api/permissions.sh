#!/bin/bash

source helpers/get_only_keys.sh
source helpers/array_to_single_quoted_cs_string.sh

TEMPLATE=$(cat scaffolding/api/stub/permissions.stub)

LOWER_CASE_MODULES_NAME="${2,,}"
LOWER_CASE_MODULE_NAME="${1,,}"

FILLED_TEMPLATE=$(echo "$TEMPLATE" | sed -r "s/\{\{MODULES\}\}/$LOWER_CASE_MODULES_NAME/g")

# Make fields list and fill `FIELDS` slot
KEYS=$(getOnlyKeys : "${@:4}")
FIELDS=$(singleQuoteAndJoin $KEYS)
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{FIELDS\}\}/$FIELDS/g")

mkdir -p "$3"/"$LOWER_CASE_MODULE_NAME"
echo "$FILLED_TEMPLATE" > "$3"/"$LOWER_CASE_MODULE_NAME"/actions.php
