<?php
renderAny(__DIR__ . '/_introduction.md', ['strip-paragraph-tag' => true]);
am_var('directory_of', 'programs');
load_amadeus_module('directory');
