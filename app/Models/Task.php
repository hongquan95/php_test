<?php
namespace App\Models;

use PDO;

class Task extends DB
{
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM tasks ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getDataBetweenDate($start, $end)
    {
        $db = static::getDB();
        $sql = "SELECT * FROM tasks where start_date < ? AND end_date >= ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$end, $start]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function findOne($id)
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM tasks WHERE id = $id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    public static function create($params)
    {
        $db = static::getDB();
        $keys = '('.implode(array_keys($params), ',').')';
        $values = array_values($params);
        $bindings = [];
        for($i = 0; $i < count($params); $i++) {
            array_push($bindings, '?');
        }
        $bindings = '('.implode($bindings, ',').')';
        $sql = "INSERT INTO tasks $keys VALUES $bindings";
        $stmt = $db->prepare($sql);
        $stmt->execute($values);
    }
    public static function update($id, $params)
    {
        $db = static::getDB();
        $sql = "UPDATE tasks SET name = ?, status = ?, start_date = ?, end_date = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$params['name'], $params['status'], $params['start_date'], $params['end_date'], $id]);
    }
    public static function delete($index)
    {
        $db = static::getDB();
        $sql = "DELETE FROM tasks where id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$index]);
    }
}
