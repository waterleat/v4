#!/bin/bash
# Commands to run in each terminal
commands=(
  "cd ~/sites/laravel/v4 && code ."
  "cd ~/sites/laravel/v4 && npm run dev"
  "cd ~/sites/laravel/v4 && php artisan serve"
  "xdg-open http://127.0.0.1:8000"
)
# Open a new terminal window for each command
for ((i=0; i<${#commands[@]}; i++))
do
  mate-terminal --tab --title="Terminal $((i+1))" -- bash -c "${commands[i]}; exec bash"
done