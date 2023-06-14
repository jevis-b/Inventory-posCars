<?php
require_once "connection.php";

class CategoriesModel {
	/*=============================================
	CREATE CATEGORY
	=============================================*/
	static public function mdlAddCategory($table, $data) {
		$stmt = Connection::connect()->prepare("INSERT INTO $table (category) VALUES (:category)");
		$stmt->bindParam(":category", $data, PDO::PARAM_STR);
		
		if ($stmt->execute()) {
			$stmt->closeCursor();
			return 'ok';
		} else {
			$stmt->closeCursor();
			return 'error';
		}
	}

	/*=============================================
	SHOW CATEGORY 
	=============================================*/
	static public function mdlShowCategories($table, $item = null, $value = null) {
		if ($item !== null) {
			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :value");
			$stmt->bindParam(":value", $value, PDO::PARAM_STR);
			$stmt->execute();
			$results = $stmt->fetch();
		} else {
			$stmt = Connection::connect()->prepare("SELECT * FROM $table");
			$stmt->execute();
			$results = $stmt->fetchAll();
		}

		$stmt->closeCursor();
		return $results;
	}

	/*=============================================
	EDIT CATEGORY
	=============================================*/
	static public function mdlEditCategory($table, $data) {
		$stmt = Connection::connect()->prepare("UPDATE $table SET Category = :category WHERE id = :id");
		$stmt->bindParam(":category", $data["Category"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
		
		if ($stmt->execute()) {
			$stmt->closeCursor();
			return "ok";
		} else {
			$stmt->closeCursor();
			return "error";
		}
	}

	/*=============================================
	DELETE CATEGORY
	=============================================*/
	static public function mdlDeleteCategory($table, $data) {
		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");
		$stmt->bindParam(":id", $data, PDO::PARAM_INT);
		
		if ($stmt->execute()) {
			$stmt->closeCursor();
			return "ok";
		} else {
			$stmt->closeCursor();
			return "error";
		}
	}
}
?>