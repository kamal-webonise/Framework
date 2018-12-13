<?php
//require_once "../database/mysql_database.php";
//require_once "../database/database_factory.php";
//$tableName="Employee";
class ActiveRecord{
	function generateActiveRecord($tableName){
		$mysqldatabase = DatabaseFactory::getDatabaseInstance('mysql');
		$myfile = fopen(ROOTPATH ."/app/models/".$tableName."_model".".php", "w") or die("Unable to open file!");
		$contentToWrite = "<?php \n";
		$contentToWrite =$contentToWrite."\n require_once \"".ROOTPATH."/database/mysqldatabase.php\";\n";
		$contentToWrite =$contentToWrite."\n class ".$tableName."_model { \n\n";
		$query=$mysqldatabase->query("SHOW COLUMNS FROM ".$tableName);
		$parameters="[";

		$query=get_object_vars($query)['result'];
		for($i=0;$i<sizeof($query);$i++)
		{
			$contentToWrite =$contentToWrite."\tprivate $".get_object_vars($query[$i])['Field']."; \n";
		}
		$contentToWrite =$contentToWrite."\tprivate \$mysqldatabase; \n\n";
		$contentToWrite =$contentToWrite."\tpublic function __construct(){\n";
		$contentToWrite =$contentToWrite."\t\t\$this->mysqldatabase = new MysqlDatabase(); \n\t}\n";
		for($i=0;$i<sizeof($query);$i++)
		{
			$var=get_object_vars($query[$i])['Field'];
			if($i==sizeof($query)-1)
				$parameters=$parameters."\"".$var."\" => \$this->".$var;
			else
			{
				$parameters=$parameters."\"".$var."\" => \$this->".$var.",";
			}
			$contentToWrite =$contentToWrite."\n \tpublic function  set".ucfirst($var)."($".$var."){  \n";
			$contentToWrite =$contentToWrite."\t\t\$this->".$var." = $".$var."; \n \t}\n ";
		}
		for($i=0;$i<sizeof($query);$i++)
		{
			$var=get_object_vars($query[$i])['Field'];
			$contentToWrite =$contentToWrite."\n \tpublic function  get".ucfirst($var)."(){  \n";
			$contentToWrite =$contentToWrite."\t\t return \$this->".$var."; \n \t}\n ";
		}
		$parameters=$parameters."]";
	
	/*$contentToWrite =$contentToWrite."\n\tpublic function fetch(){ ";
	$contentToWrite =$contentToWrite."\n\t\treturn \$this->mysqldatabase->query(\"SELECT * FROM ".$tableName."\");";
	$contentToWrite =$contentToWrite."\n\t}\n";
	
	$contentToWrite =$contentToWrite."\n\tpublic function insert(){ ";
	$contentToWrite =$contentToWrite."\n\t\t\$this->mysqldatabase->insert(\"".$tableName."\",".$parameters.");";
	$contentToWrite =$contentToWrite."\n\t}\n";
	
	$parameters=str_replace(explode(',',$parameters)[0].",","[",$parameters);
	$contentToWrite =$contentToWrite."\n\tpublic function update(){ ";
	$contentToWrite =$contentToWrite."\n\t\t\$this->mysqldatabase->update(\"".$tableName."\",\$this->".get_object_vars($query[0])['Field'].",".$parameters.");";
	$contentToWrite =$contentToWrite."\n\t}\n";
	
	$contentToWrite =$contentToWrite."\n\tpublic function delete(){ ";
	$contentToWrite =$contentToWrite."\n\t\t\$this->mysqldatabase->delete(\"".$tableName."\",\$this->".get_object_vars($query[0])['Field'].");";
	$contentToWrite =$contentToWrite."\n\t}\n";*/
	
		$contentToWrite =$contentToWrite."\n}";
		fwrite($myfile, $contentToWrite);
		fclose($myfile);
	}
}



?>
