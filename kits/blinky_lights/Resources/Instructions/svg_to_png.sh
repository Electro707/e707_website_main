#!/bin/bash
mkdir "$PWD"/pdf
for file in $PWD/*.svg
    do
        filename=$(basename "$file")
        inkscape -d 300 -C -o "$PWD"/"${filename%.svg}.png" "$file"
    done
