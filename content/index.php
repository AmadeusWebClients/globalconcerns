<?php
echo getSnippet('latest-message');

contentBox('introduction', 'container');
printH1InDivider('Welcome to ' . variable('name'));
renderAny(__DIR__ . '/_introduction.md');
contentBox('end');

return; //TODO: High!
variable('directory_of', 'programs');
runFeature('directory');
