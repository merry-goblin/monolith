<?php

namespace Monolith\Acme\Casterlith\Mappers;

use Monolith\Casterlith\Entity\EntityInterface;
use Monolith\Casterlith\Mapper\AbstractMapper;
use Monolith\Casterlith\Mapper\MapperInterface;
use Monolith\Casterlith\Relations\OneToMany;
use Monolith\Casterlith\Relations\ManyToOne;

class User extends AbstractMapper implements MapperInterface
{
	protected static $table      = 'user';
	protected static $entity     = 'Monolith\\Acme\\Casterlith\\Entities\\User';
	protected static $fields     = null;
	protected static $relations  = null;

	public static function getPrimaryKey()
	{
		return 'id';
	}

	/**
	 * @return array
	 */
	public static function getFields()
	{
		if (is_null(self::$fields)) {
			self::$fields = array(
				'id'        => array('type' => 'integer', 'primary' => true, 'autoincrement' => true),
				'login'     => array('type' => 'string'),
				'password'  => array('type' => 'string'),
				'status'    => array('type' => 'integer'),
				'roles'     => array('type' => 'string'),
			);
		}

		return self::$fields;
	}

	public static function getRelations()
	{
		return self::$relations;
	}
}
