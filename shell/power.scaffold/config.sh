#!/bin/bash

MODULE="${1,,}"

# Creates an config file for MODULE
cat "scaffolding/stub/config.stub" > "modules/$MODULE.conf"
