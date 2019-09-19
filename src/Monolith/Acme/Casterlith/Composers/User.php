<?php

namespace Monolith\Acme\Casterlith\Composers;

use Monolith\Casterlith\Composer\ComposerInterface;
use Monolith\Casterlith\Composer\AbstractComposer;

class User extends AbstractComposer implements ComposerInterface
{
	protected static $mapperName  = 'Monolith\\Acme\\Casterlith\\Mappers\\User';
}
