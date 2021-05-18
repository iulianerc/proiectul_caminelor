#!/bin/bash

source parser/tokens.sh

# Service for tokenizing config files

# Finds fields declaration position
function findFields() {
  FIELDS_BEGIN=$(grep -n -m 1 "${TOKENS[fields_begin]}" "$1" | sed 's/\([0-9]*\).*/\1/')
  FIELDS_BEGIN="$((FIELDS_BEGIN + 1))"

  FIELDS_END=$(grep -n -m 1 "${TOKENS[fields_end]}" "$1" | sed 's/\([0-9]*\).*/\1/')
  FIELDS_END="$((FIELDS_END - 1))"

  echo "$FIELDS_BEGIN,$FIELDS_END"
}

# Finds validation rules declaration position
function findValidationRules() {
  VALIDATION_BEGIN=$(grep -n -m 1 "${TOKENS[validation_begin]}" "$1" | sed 's/\([0-9]*\).*/\1/')
  VALIDATION_BEGIN="$((VALIDATION_BEGIN + 1))"

  VALIDATION_END=$(grep -n -m 1 "${TOKENS[validation_end]}" "$1" | sed 's/\([0-9]*\).*/\1/')
  VALIDATION_END="$((VALIDATION_END - 1))"

  echo "$VALIDATION_BEGIN,$VALIDATION_END"
}
