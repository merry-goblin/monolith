<?php

namespace Monolith\Acme\Casterlith\Entities;

use Monolith\Casterlith\Casterlith;
use Monolith\Casterlith\Entity\EntityInterface;

class User implements EntityInterface
{
	public $id        = null;
	public $login     = null;
	public $password  = null;
	public $status    = null;
	public $roles     = null;

	public $albums  = Casterlith::NOT_LOADED;

	public function getPrimaryValue()
	{
		return $this->id;
	}
}
