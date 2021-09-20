#!/bin/bash
mkdir "$PWD"/pdf
for file in $PWD/svg/*.svg
    do
        filename=$(basename "$file")
        echo "F $filename"
        inkscape -d 300 -C -o "$PWD"/png/"${filename%.svg}.png" "$file"
        inkscape -d 300 -C -o "$PWD"/pdf/"${filename%.svg}.pdf" "$file"
    done
