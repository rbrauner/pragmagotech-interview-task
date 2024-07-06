# Architecture

## Overview

Firstly calculator is determining the term structure (for now 12 and 24 months) and then (after checking if the amount is within the range) it checks range which amount falls into. Then it calculates percentage of this range. With this info it can calculate fee and round it up to the nearest multiple of 5.

## Technologies

-   PHP 8.3.8
-   Composer 2.7.7
-   PHPUnit
-   PHPStan
-   PHP-CS-Fixer
-   PHP CodeSniffer
-   Rector
-   GrumPHP

## Folder structure

-   src/Contracts - contains interfaces
-   src/Exception - contains custom exceptions
-   src/Factory - contains factory classes
-   src/Model - contains model classes
-   src/Service - contains service classes (e.g. FeeCalculator)
-   src/Util - contains utility classes
