# grummfy/atoum-ide-helper-extension [![Build Status](https://travis-ci.org/Grummfy/ide-helper-extension.svg?branch=master)](https://travis-ci.org/Grummfy/atoum-ide-helper-extension)

This extension add some helps in relations with your IDE by opening failed test inside your IDE.

## Install it

### composer

Install extension using [composer](https://getcomposer.org):

```
composer require --dev grummfy/atoum-ide-helper-extension
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
$cliReport->addField(new execute\phpstorm());
$runner->addReport($cliReport);
```

The best would be to configure it on your machine and not on on your repository and use the inheritance of [atoum's configuration](http://docs.atoum.org/en/latest/configuration_bootstraping.html#fichier-de-configuration) to use it.

### PHPStorm

```php
<?php
// ...
// under windows
$cliReport->addField(new execute\phpstorm('c:\\Program Files\\...\\phpstorm.exe'));
// under macOs, if different than the default path
$cliReport->addField(new execute\phpstorm('/Applications/PhpStorm.app/pstorm'));
// under other unix
$cliReport->addField(new execute\phpstorm());
// under other unix if the command line launcher is not setted (PHPStorm>Tools>Create Command line...)
$cliReport->addField(new execute\phpstorm('/opt/phpstorm/bin/pstorm'));
// under any os where PHPSTORM_PATH is defined as env var and contains a path to PHPStorm
$cliReport->addField(new execute\phpstorm());
// ...
```

### gVIM

```php
<?php
// ...
$cliReport->addField(new execute\unix\gvim());
// ...
```

### gedit

```php
<?php
// ...
$cliReport->addField(new execute\unix\gedit());
// ...
```

### geany

```php
<?php
// ...
$cliReport->addField(new execute\unix\geany());
// ...
```

### macVIM

```php
<?php
// ...
$cliReport->addField(new execute\macos\macvim());
// ...
```
### Generic

For any other case, just use what's provided by atoum:

```php
<?php
// ...
use mageekguy\atoum\report\fields\runner\failures\execute;
// ...
// here with gvim
$cliReport->addField(new execute('gvim +%2$d %1$s > /dev/null &'));
// ...
```

## Links

* [atoum](http://atoum.org)
* [atoum's documentation](http://docs.atoum.org)
* [atoum's extension](http://extensions.atoum.org/)

## License

atoum-ide-helper-extension is released under the BSD-3-Clause License. See the bundled [LICENSE](LICENSE) file for details.

![atoum](http://atoum.org/images/logo/atoum.png)

## Origin of the extension

This extension was originally an extraction of the code from the code inside atoum with some improvements.
