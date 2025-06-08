<?php
contentBox('introduction', 'container');
printH1InDivider('Welcome to ' . variable('name'));
renderAny(__DIR__ . '/_introduction.md');
contentBox('end');

variable('directory_of', 'programs');
variable('directory_use_excerpts', 'programs');
runFeature('directory');
