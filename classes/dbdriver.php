<?php
namespace Dbdriver; 

require_once 'database.php';
use database\DatabaseConnect;

class DBDriver  // MySQL type 
{
    protected $db; // PDO object

    public function __construct() // Connect to DB 
    { 
    	$this->db = DatabaseConnect::getConnect();
    }
    public function insert($table, array $params)  // Insert data to DB
    {
    	$colums = sprintf('(%s)', implode(', ', array_keys($params)));
   		$masks = sprintf('(:%s)', implode(', :', array_keys($params)));

   		$sql = sprintf('INSERT INTO %s %s VALUES %s', $table, $colums, $masks);

   		$query = $this->db->prepare($sql);
   		$query->execute($params);
    }
    public function  select($sql, array $params = []) // Execute select ($sql - string with query)
    { 
    	$query = $this->db->prepare($sql);
        $query->execute();
    	$query = $query->rowcount() ? $query : [];
        return $query;
    }
    public function update($table, array $params, array $where)  // Update data in DB; 
    {
    	$column = [];
    	$param = [];

    	foreach($params as $key => $value) $column[] = "$k = :$k";
    	foreach($where as $key => $value) $param[] = "$k = :$k";

    	$columns = sprintf('%s', implode(', ', $column));
    	$condition = sprintf('%s', implode(', ', $param));
    	$values = array_merge($params, $where);


    	$sql = sprinf('UPDATE %s SET %s WHERE %s', $table, $columns, $condition);

    	$query = $this->db->prepare($sql);
    	$query->execute($values);
    }
    public function delete($table, array $where) // Delete data in DB
    {
    	$param = [];

    	foreach($where as $key => $value) $param[] = "$key = :$key";
    	
    	$condition = sprintf('%s', implode(', ', $param));

    	$sql = sprintf('DELETE FROM %s WHERE %s',$table, $condition);

    	$query = $this->db->prepare($sql);
    	$query->execute($where);
    }
}

