#!/bin/bash

source env.sh
source parser/locator.sh
source helpers/get_config_file_name.sh

# Module name with first char uppercase
MODULE="${1^}"
# Module plural  name with first char uppercase
MODULES="${2^}"

# Config file path
CONFIG_FILE=$(getConfigFileName "$1")
# Find fields location in config file
FIELDS_LOCATION=$(findFields  "$CONFIG_FILE")
# Read fields from config
declare FIELDS=()
while read -r field; do
  FIELDS+=("$field")
done < <(sed -n "$FIELDS_LOCATION"'p' "$CONFIG_FILE")

# Generate elements
for COMPONENT in "${!PATHS[@]}"; do
    scaffolding/api/"$COMPONENT".sh "$MODULE" "$MODULES" "${PATHS[$COMPONENT]}" "${FIELDS[@]}"
    if [ $? -ne 0 ]; then
        echo "Error..." && exit
    fi
done

echo "Done"
