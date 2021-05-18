#!/bin/bash

declare -A PATHS=(
  [permissions]=../../config/permissions/general/modules
  [localization]=../../resources/lang/en/modules
  [migration]=../../database/migrations
  [seeder]=../../database/seeds/com
  [model]=../../app/Models
  [repository]=../../app/Repositories
  [request]=../../app/Http/Requests
  [resource]=../../app/Http/Resources
  [form]=../../app/Templates
  [controller]=../../app/Http/Controllers/v1
)
