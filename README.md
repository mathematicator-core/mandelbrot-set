Mandelbrot set simple PHP Generator
===================================

![Integrity check](https://github.com/mathematicator-core/mandelbrot-set/workflows/Integrity%20check/badge.svg)

Simple Generator for create image of Mandelbrot set as base64 by full-configuration request.

This package was inspired by Pavol Hejný.

Install
-------

By Composer:

```shell
composer require mathematicator-core/mandelbrot-set
```

Use
---

Inject `MandelbrotSet` service to your application, create new Request and process by `loadImage()` method.
