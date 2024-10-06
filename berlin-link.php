<?php
/**
 * Plugin Name:     Berlin Link
 * Plugin URI:      https://plugins.wp-cli.org/demo-plugin
 * Description:     This is a Berlin Link demo plugin
 * Author:          kishores
 * Author URI:      https://wp-cli.org
 * Text Domain:     berlin-link
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Berlin_Link
 */

require_once __DIR__ . '/vendor/autoload.php';

use BerlinDB\Database\Table as Table;

class Build_Table extends Table {

	/**
	 * Database version key (saved in _options or _sitemeta)
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $db_version_key = 'berlin_db_version';

	/**
	 * Optional description.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	public $description = 'Links';

	/**
	 * Database version.
	 *
	 * @since 1.0.0
	 * @var   mixed
	 */
	protected $version = '1.0.0';

	/**
	 * Key => value array of versions => methods.
	 *
	 * @since 1.0.0
	 * @var   array
	 */
	protected $upgrades = array();

	/**
	 * Hook into queries, admin screens, and more!
	 *
	 * @since 1.0.0
	 */
	public function __construct( $name, $schema ) {

		// Set the database name
		$this->name = $name;

		// Set the database schema
		$this->schema = $this->arr_to_schema($schema);

		parent::__construct();
	}

	function arr_to_schema($columns) {
		$arr = [];
		foreach ($columns as $key1 => $value) {
			$arr[$key1] = " ";
			//echo $string .= $value['name'] . " " .  $value['type'] . " " . $value['length'];
			foreach ($value as $key2 => $val) {

				$length = (isset($value['length'])) ?  "(" . $value['length'] . ")" : " ";
				$extra  = (isset($value['extra'])) ?  strtoupper($value['extra']) : " ";
				$primary  = (isset($value['primary'])) ?  "PRIMARY KEY" : " ";
				$unique  = (isset($value['unique'])) ?  "UNIQUE" : " ";

				$arr[$key1] = $value['name'] . " " .  $value['type'] . $length . " " . "NOT NULL" . " "
				. $extra . " " . $primary . " " .$unique;
			}
		}

		return $schema = implode(", ",$arr);
	}



	/**
	 * Setup this database table.
	 *
	 * @since 1.0.0
	 */
	protected function set_schema() {}
}


$columns = [

	//id
	'id'           => [
		'name'     => 'id',
		'type'     => 'bigint',
		'length'   => '20',
		'unsigned' => true,
		'extra'    => 'auto_increment',
		'primary'  => true,
		'unique'  => true,
		'sortable' => true,
	],

	//url
	'url'         => [
		'name'       => 'url',
		'type'       => 'mediumtext',
		//'length'	 => '127',
		//'unique'  => true,
		'unsigned'   => true,
		'searchable' => true,
		'sortable'   => true,
	],

	//title
	'title'         => [
		'name'       => 'title',
		'type'       => 'mediumtext',
		'unsigned'   => true,
		'searchable' => true,
		'sortable'   => true,
	],

	//author
	'author'         => [
		'name'       => 'author',
		'type'       => 'mediumtext',
		'unsigned'   => true,
		'searchable' => true,
		'sortable'   => true,
	],

	//date_created
	'date_created' => [
		'name'       => 'date_created',
		'type'       => 'datetime',
		'date_query' => true,
		'unsigned'   => true,
		'searchable' => true,
		'sortable'   => true,
	],

	//date_published
	'date_published' => [
		'name'       => 'date_published',
		'type'       => 'datetime',
		'date_query' => true,
		'unsigned'   => true,
		'searchable' => true,
		'sortable'   => true,
	],

];




/**
 * TABLE SETUP
 * This creates the database tables, and add the table to the database.
 */

// Instantiate the Books Table class.
$table = new Build_Table( 'my_links', $columns);
