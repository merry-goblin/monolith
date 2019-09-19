<?php 

namespace Monolith\Acme\Controllers;

class MainController
{
	private $orm = null;

	public function __construct()
	{
		$this->orm = $this->getCasterlith();
	}

	public function getAction()
	{
		$this->addUser();
		$this->getUser();
	}

	private function getUser()
	{
		$userComposer  = $this->orm->getComposer('Monolith\Acme\Casterlith\Composers\User');
		$qb            = $userComposer->getQueryBuilder();

		$users = $userComposer
			->select("u")
			->all();

		var_dump($users);
	}

	private function addUser()
	{
		$dbal = $this->orm->getDBALConnection();

		$login     = "crabe".time();
		$password  = md5("bubble");

		$sql = "
			INSERT into user
				( login,  password,  status,  roles)
			VALUES
				(:login, :password, :status, :roles)
		";
		$values = array(
			'login'    => $login,
			'password' => $password,
			'status'   => 1,
			'roles'    => "user",
		);

		$numberOfUpdatedRows = $dbal->executeUpdate($sql, $values);
		if ($numberOfUpdatedRows === false) {
			echo "An error occured";
		}
		else {
			echo "Update successful";
		}
	}

	private function getCasterlith()
	{
		//	Parameters to connect on SQLite database
		$params = array(
			'dbname'   => 'monolith_demo',
			'user'     => 'root',
			'password' => '',
			'host'     => 'localhost',
			'driver'   => 'pdo_mysql',
			'charset'  => 'utf8',
		);
		$config = new \Monolith\Casterlith\Configuration();
		$config->setSelectionReplacer("_cl");

		$orm = new \Monolith\Casterlith\Casterlith($params, $config);

		return $orm;
	}
}
