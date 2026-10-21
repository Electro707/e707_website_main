"""
ChatGPT generated, takes a JS file and obfuscates any if statement and string

Used for funny messages where I don't want any spoilers. The JS file must have
    "// START CODE" to delineate the code to add space

First argument is the file
"""
import re
import json
import base64
import sys

def encode(text):
    return base64.b64encode(text.encode("utf-8")).decode("ascii")

def obfuscate_condition(match):
    condition = match.group(1).strip()
    return f'if (eval(atob("{encode(condition)}")))'

def obfuscate_string(match):
    text = json.loads(match.group(2))
    return f'{match.group(1)}atob("{encode(text)}")'

with open(sys.argv[1], encoding="utf-8") as f:
    source = f.read().partition("// START CODE")[2]

# Obfuscate if conditions
source = re.sub(
    r'\bif\s*\(([^()]*)\)',
    obfuscate_condition,
    source
)

# Obfuscate strings appended with +=
source = re.sub(
    r'(\+=\s*)("(?:\\.|[^"\\])*")',
    obfuscate_string,
    source
)

print(source)