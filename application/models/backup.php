<?php

class Backup extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function make_backup(){
		ini_set('display_errors', 'Off');
		error_reporting(0);
		return $this->backup_tables($this->db->hostname, $this->db->username,
			$this->db->password, $this->db->database);
	}
	function delete(){
		$this->delete_all($this->db->hostname, $this->db->username,
			$this->db->password, $this->db->database);
	}
	function delete_all($host,$user,$pass,$name,$tables = '*'){
		$link = mysqli_connect($host,$user,$pass);
		mysqli_select_db($name,$link);

		//get all of the tables
		if($tables == '*') {
			$tables = array();
			$result = mysqli_query('SHOW TABLES');
			while($row = mysqli_fetch_row($result)){
				$tables[] = $row[0];
			}
		}
		
		foreach($tables as $table)
		{
			if( $table == 'Usuario' ) continue;
			$result = mysqli_query('DELETE FROM ' . $table . '');
		}
		$result = mysqli_query('DELETE FROM Usuario WHERE tipo_permissao <> \'administrador\'');
		
	}


	function backup_tables($host,$user,$pass,$name,$tables = '*') {
		$return = '';
		$link = mysqli_connect($host,$user,$pass);
		mysqli_select_db($name,$link);

		//get all of the tables
		if($tables == '*') {
			$tables = array();
			$result = mysqli_query('SHOW TABLES');
			while($row = mysqli_fetch_row($result))
			{
				$tables[] = $row[0];
			}
		}
		else
		{
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}

		//cycle through
		foreach($tables as $table)
		{
			$result = mysqli_query('SELECT * FROM '.$table);
			$num_fields = mysqli_num_fields($result);

			$return .= 'DROP TABLE '.$table.';';
			$row2 = mysqli_fetch_row(mysqli_query('SHOW CREATE TABLE '.$table));
			$return .= "\n\n".$row2[1].";\n\n";

			for ($i = 0; $i < $num_fields; $i++) 
			{
				while($row = mysqli_fetch_row($result))
				{
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j<$num_fields; $j++) 
					{
						$row[$j] = addslashes($row[$j]);
						$row[$j] = ereg_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
						if ($j<($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				}
			}
			$return.="\n\n\n";
		}

		//save file
		// $handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
		//fwrite($handle,$return);
		// fclose($handle);
		return $return;
	}
}