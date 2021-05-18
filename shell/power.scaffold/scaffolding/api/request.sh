#!/bin/bash

source helpers/get_config_file_name.sh
source helpers/join_array.sh
source parser/locator.sh

TEMPLATE=$(cat scaffolding/api/stub/request.stub)

FILLED_TEMPLATE=$(echo "$TEMPLATE" | sed -r "s/\{\{MODULE\}\}/$1/g")

LOWER_CASE_MODULE="${1,,}"
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{LOWER_CASE_MODULE\}\}/$LOWER_CASE_MODULE/g")

# Find fields location in config file
CONFIG_FILE=$(getConfigFileName "$1")
VALIDATION_LOCATION=$(findValidationRules  "$CONFIG_FILE")

# Read validation from config
declare VALIDATION_RULES=()
while IFS=':'  read -r field  rule; do
  VALIDATION_RULES+=("'$field' => '$rule'")
done < <(sed -n "$VALIDATION_LOCATION"'p' "$CONFIG_FILE")

# Convert validation array to string
VALIDATION_RULES_AS_STRING=$(join ",\n" "${VALIDATION_RULES[@]}")
# Fill `VALIDATION_RULES` slot
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{VALIDATION_RULES\}\}/$VALIDATION_RULES_AS_STRING/g")

mkdir -p "$3"/"$1"
echo "$FILLED_TEMPLATE" > "$3"/"$1"/"$1"Request.php
