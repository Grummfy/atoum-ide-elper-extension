# atoum/ide-helper-extension [![Build Status](https://travis-ci.org/atoum/ide-helper-extension.svg?branch=master)](https://travis-ci.org/atoum/ide-helper-extension)

This extension add some helps in relations with your IDE.

* open failed test inside your IDE
* ....

## Install it

### composer

Install extension using [composer](https://getcomposer.org):

```
composer require --dev atoum/ide-helper-extension
```

## Configure it

Inside your [configuration](http://docs.atoum.org/en/latest/configuration_bootstraping.html#fichier-de-configuration) file you can add the following codes:
```php
<?php
use
    mageekguy\atoum,
    atoum\ideHelper\report\fields\runner\failures\execute
;

// defined a cli report
$stdOutWriter = new atoum\writers\std\out();
$cliReport = new atoum\reports\realtime\cli();
$cliReport->addWriter($stdOutWriter);

// then add the link to your ide, here is PHPStorm
$cliReport->addField(new phpstorm());
$runner->addReport($cliReport);
```

### PHPStorm

```php
<?php
// ...
// under windows
$cliReport->addField(new phpstorm('c:\\Program Files\\...\\phpstorm.exe'));
// under macOs, if different than the default path
$cliReport->addField(new phpstorm('/Applications/PhpStorm.app/pstorm'));
// under other unix
$cliReport->addField(new phpstorm());
// under other unix if the command line launcher is not setted (PHPStorm>Tools>Create Command line...)
$cliReport->addField(new phpstorm('/opt/phpstorm/bin/pstorm'));
// under any os where PHPSTORM_PATH is defined as env var and contains a path to PHPStorm
$cliReport->addField(new phpstorm());
// ...
```

### VIM

### gVIM

### gedit

### macVIM

```php
<?php
// ...
$cliReport->addField(new macos\macvim());
// ...
```

## Links

* [atoum](http://atoum.org)
* [atoum's documentation](http://docs.atoum.org)
* [atoum's extension](http://extensions.atoum.org/)

## License

ide-helper-extension is released under the BSD-3-Clause License. See the bundled [LICENSE](LICENSE) file for details.

![atoum](http://atoum.org/images/logo/atoum.png)
