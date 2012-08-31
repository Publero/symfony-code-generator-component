Code Generator Component
========================

Code Generator provides classes for simple random hash and random custom alpabet codes.

Usage
-----

Random hash codes can be generated like this:

``` php
<?php
$sha1Generator = new Sha1HashGenerator();
$sha1Hash = $sha1Generator->generate();

$md5Generator = new Md5HashGenerator();
$md5Hash = $md5Generator->generate();
```

And custom alphabet code example:

``` php
<?php
$alphabet = 'abcdef';
$codeGenerator = new CustomAlphabetCodeGenerator($alphabet, 8);
$code = $codeGenerator->generate(); // code consisting of 8 a-f characters
$defaultCodeGenerator = new CustomAlphabetCodeGenerator();
$code = $codeGenerator->generate(); // generates 10 character long code of a-zA-Z0-9 characters
```

Resources
---------

You can run the unit tests with the following command:

    phpunit
