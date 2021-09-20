---
layout: post
title:  "Personal LaTeX package karnaugh-map Fork Update#1"
date:   2020-10-25
categories: update, latex
---

Recently my friend has shown me a LaTeX package by the name of [kmap_update](https://github.com/2pi/karnaugh-map). It's a really cool package able to generate nice looking kmaps. The package tough doesn't allow for color changes by the user as it's hard-coded in. I originally went ahead and forked it to add said feature (it was really just a new DocumentCommand to redefine the internal \@karnaughmap@func@decimaltocolor@ function). Spending some time tough looking at the internals of the package, I tough it could do better. It didn't help that the package hasn't been updated in almost 3.5 years (although a v2 branch hasn't been updated since 2 years ago). So I've decided to use my fork as a substantial improvement of the package.

Here are some things that I have changed so far and plan on changing/adding in the future:

## Internal change: Conversion to LuaLaTeX
The first things that I had to is to make the package LuaLaTex only. The reason is 2 fold: I personally don't like using plain Tex for programming (it's possible, it just becomes a pain in the a**), and also because without it the package has to do things like this for example to make a decimal-to-binary converter:
<img src="/assets/blog_pics/2020_10_25_latex-kmap-update1/Screenshot_20201025_020539.png" class="image_center">
Which although it still works, I just think it's a dirty way of doing it.

## Tikz/PGF revamp
The way the package generates a k-map is by creating a grid, then creating a matrix of nodes, in which those nodes are later substituted with an term if the user chooses to. This method is dependent on an alignment between the grid and the matrix, and I felt that it shouldn't be the case(especially as the nodes inside of the matrix could have their own outline, and thus creating a grid-like shape without replying on a second object), so I set out and changed that. 
The matrices were also hard coded:
<img src="/assets/blog_pics/2020_10_25_latex-kmap-update1/Screenshot_20201025_021648.png" class="image_center">
and as I was switching to LuaLaTeX anyways, I've decided to make the matrix generation into a Lua function.  

The other nuisance with the matrix is the way it handles a 4x4x2 matrix or similar (ones where are technically 2 kmaps linked, for a 5 or 6 variable k-map). The package creates it as a single grid/matrix, and I believe that it should be separate and individual matrices which will also allow for some extra options to be easily implement like:

## Mutlti-Kmap (5 and 6 variable) table separation. 
I've seen a 5+ variable's 4-variable kmaps separated in 2 ways: either with a separator distance, or with thick border lines. The package does it with a separator distance. As I was revamping the tikz/pgf implementation, I figured I should add the option to allow for both shown here:
<img src="/assets/blog_pics/2020_10_25_latex-kmap-update1/Screenshot_20201025_021851.png" class="image_center">
<img src="/assets/blog_pics/2020_10_25_latex-kmap-update1/Screenshot_20201025_021945.png" class="image_center">
Which I think is nice. You may have noticed another thing that I also added:

## Top-Left Variable lines
I have also added a top-left line with the variable's names in it (AB/CD for example). In the future I'll allow the option to enable to disable it depeding on personal preferences

## TODO and Future:
My fork, which could be found [here](https://github.com/Electro707/karnaugh-map) is nowhere near finished. I still have to test out and/or improve the implicant drawing (especially as I changed how the k-maps are drawn). I do plan tough (after finishing that and making sure that the package works with the new changes) to add some nice features, like for example:
- Drawing an arrow between an implicant across of a kmap (for 5 and 6 variables)
- Automatically generating the boolean expression based on the drawn implicants
- Allowing the implicants to be drawn automatically from a boolean expression
- Allow a 3D drawing of a 5 or 6 variable k-map. 

The last 2 on that list is very long term tough.
