<?php
renderAny(__DIR__ . '/_introduction.md');
assistant();

am_var('directory_of', 'programs');
includeFeature('directory');
