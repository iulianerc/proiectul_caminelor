#!/bin/bash

source helpers/get_only_keys.sh
source helpers/array_to_single_quoted_cs_string.sh
source helpers/array_to_annotations.sh

TEMPLATE=$(cat scaffolding/api/stub/model.stub)

FILLED_TEMPLATE=$(echo "$TEMPLATE" | sed -r "s/\{\{MODULE\}\}/$1/g")

# Make fields list and fill `FIELDS` slot
KEYS=$(getOnlyKeys : "${@:4}")
FIELDS=$(singleQuoteAndJoin $KEYS)
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{FIELDS\}\}/$FIELDS/g")

# Make properties annotations list and fill `PROPERTIES_ANNOTATIONS` slot
PROPERTIES_ANNOTATIONS=$(makeProperties ":" "${@:4}")
FILLED_TEMPLATE=$(echo "$FILLED_TEMPLATE" | sed -r "s/\{\{PROPERTIES_ANNOTATIONS\}\}/$PROPERTIES_ANNOTATIONS/g")

mkdir -p "$3"/"$1"
echo "$FILLED_TEMPLATE" > "$3"/"$1"/"$1".php
