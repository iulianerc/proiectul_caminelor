#!/bin/bash

source helpers/get_only_keys.sh
source helpers/join_array.sh
source helpers/array_to_annotations.sh

TEMPLATE=$(cat scaffolding/api/stub/resource.stub)

FILLED_TEMPLATE=$(echo "$TEMPLATE" | sed -r "s/\{\{MODULE\}\}/$1/g")

# Read keys
declare KEYS=($(getOnlyKeys : "${@:4}"))
declare RESOURCE_FIELDS=()

# Make php array elements
for ITEM in "${!KEYS[@]}"; do
  RESOURCE_FIELDS+=("'${KEYS[$ITEM]}' => \$this->${KEYS[$ITEM]}")
done
RESOURCE_FIELDS_AS_STRING=$(join ",\n" "${RESOURCE_FIELDS[@]}")

# Fill `FIELDS` slot
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{FIELDS\}\}/$RESOURCE_FIELDS_AS_STRING/g")

# Make properties annotations list and fill `PROPERTIES_ANNOTATIONS` slot
PROPERTIES_ANNOTATIONS=$(makeProperties ":" "${@:4}")
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{PROPERTIES_ANNOTATIONS\}\}/$PROPERTIES_ANNOTATIONS/g")

mkdir -p "$3"/"$1"
echo "$FILLED_TEMPLATE" >"$3"/"$1"/"$1"Resource.php
