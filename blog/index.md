---
# Feel free to add content and custom Front Matter to this file.
# To modify the layout, see https://jekyllrb.com/docs/themes/#overriding-theme-defaults

title: /
layout: home
permalink: /
---

# Welcome!

## Static Pages

<ul>
    {%- for path in site.static_pages -%}
        {%- assign my_page = site.pages | where: "path", path | first -%}
        {%- if my_page.title -%}
            <li><a href="{{ my_page.url | relative_url }}">{{ my_page.title | escape }}</a></li>
        {%- endif -%}
    {%- endfor -%}
</ul>

## Blog Posts