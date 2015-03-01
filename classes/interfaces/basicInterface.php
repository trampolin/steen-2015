<?php

abstract class BasicInterface {
	protected $db;

	protected $table;
	
	public function __construct($db = null) {
		if ($db == null) {
			$this->db = new DatabaseConnection();
		} else {
			$this->db = $db;
		}
	}

	public static $allowedCalls = array();

	public static function registerInterface()
	{
		BasicInterface::$allowedCalls[get_called_class()] = array();
		$class_methods = get_class_methods(get_called_class());
		foreach ($class_methods as $method_name) {
			if (($method_name != "registerInterface") && ($method_name != "__construct")) {
				BasicInterface::$allowedCalls[get_called_class()][$method_name] = true;
			}
		}
	}

	public function countRecords() {
		$q = 'SELECT count(id) as count FROM ' . $this->table;
		$result = $this->db->query($q);
		$num = 0;
		if ($this->db->get_last_num_rows() > 0) {
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$num = $row['count'];
			}
		}
		return new DataResponse(ResultTypes::resultOK,get_class($this)."->countRecords",$num);
	}

	public function save($row) {
		// todo mit id = update, ohne id = insert
		return new ErrorDataResponse('not implemented yet',$row);
	}

	public function getRow($id) {
		$q = 'SELECT * FROM ' . $this->table . ' WHERE id = ' . intval($id);
		$result = $this->db->query($q);
		$return = null;
		if ($this->db->get_last_num_rows() > 0) {
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$return = $row;
			}
		}
		if ($return == null) {
			return new ErrorDataResponse(get_class($this)."->getRow(" . intval($id) . ") nothing found",$id);
		}

		return new DataResponse(ResultTypes::resultOK,$return,get_class($this)."->getRow(" . intval($id) . ")");
	}

	public function getRows($data = []) {
		$select = 'SELECT '.(array_key_exists('select',$data) ? $data['select'] : '*'). ' FROM '.$this->table;

		$join = (array_key_exists('join',$data) ? ' JOIN '.$data['join'] : '');

		$where = (array_key_exists('where',$data) ? ' WHERE '.$data['where'] : '');

		$group = (array_key_exists('group',$data) ? ' GROUP BY '.$data['group'] : '');

        $order = (array_key_exists('order',$data) ? ' ORDER BY '.$data['order'] : '');

        $limit = (array_key_exists('limit',$data) ? ' LIMIT '.$data['limit'] : '');

		$q = $select.$join.$where.$group.$order.$limit;

		$result = $this->db->query($q);

		$data = array();

		if ($this->db->get_last_num_rows() > 0) {
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$data[] = $row;
			}
		}

		return new DataResponse(ResultTypes::resultOK,get_class($this)."->getRows",$data,$q);

	}

	public function testInterface($data)
	{
		return new DataResponse(ResultTypes::resultOK,"Test Interface: ".get_class($this),$data);
	}
	
	public function getInterfaceInfo()
	{
		return new DataResponse(ResultTypes::resultOK,"Interface Info: ".get_class($this),BasicInterface::$allowedCalls[get_class($this)]);
	}
}

BasicInterface::registerInterface();

