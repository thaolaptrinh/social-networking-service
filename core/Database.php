<?php

namespace App\Core;

class Database
{

  private $conn;
  public function connect()
  {
    # code...
    if (!$this->conn) {
      global $config;
      try {
        $this->conn = mysqli_connect(
          $config['db']['host'],
          $config['db']['username'],
          $config['db']['password'],
          $config['db']['name'],
          $config['db']['port'],
        );
        $this->conn->query("set names 'utf8'");
      } catch (\Throwable $th) {
        // throw $th;
        exit($th->getMessage());
      }
    }
  }
  public function disconnect()
  {
    # code...
    $this->conn->close();
    $this->conn = null;
  }
  public function db_query($select, $table, $where = null, $order = 'id DESC', $limit = '')
  {
    $this->connect();
    $query = mysqli_query($this->conn, "SELECT " . $select . " FROM " . $table . " ORDER BY " . $order . " " . $limit);
    if ($where <> null) {
      $query = mysqli_query($this->conn, "SELECT " . $select . " FROM " . $table . " WHERE " . $where . " ORDER BY " . $order . " " . $limit);
    }
    if (mysqli_error($this->conn)) {
      return false;
    } else {
      if (mysqli_num_rows($query) == 1) {
        $rows = mysqli_fetch_assoc($query);
      } else {
        $rows = [];
        while ($row = mysqli_fetch_assoc($query)) {
          $rows[] = $row;
        }
      }
      $result = array('query' => $query, 'rows' => $rows, 'count' => mysqli_num_rows($query));
      return $result;
    }
  }
  public function db_query_join($select, $table, $join, $where = null, $order = 'id DESC', $limit = '')
  {
    $this->connect();
    $query = mysqli_query($this->conn, "SELECT " . $select . " FROM " . $table . " " . $join . " ORDER BY " . $order . " " . $limit);
    if ($where <> null) {
      $query = mysqli_query($this->conn, "SELECT " . $select . " FROM " . $table . " " . $join . " WHERE " . $where . " ORDER BY " . $order . " " . $limit);
    }
    if (mysqli_error($this->conn)) {
      return false;
    } else {
      if (mysqli_num_rows($query) == 1) {
        $rows = mysqli_fetch_assoc($query);
      } else {
        $rows = [];
        while ($row = mysqli_fetch_assoc($query)) {
          $rows[] = $row;
        }
      }
      $result = array('query' => $query, 'rows' => $rows, 'count' => mysqli_num_rows($query));
      return $result;
    }
  }
  public function db_insert($table, $data)
  {
    $this->connect();
    if (!is_array($data)) {
      return false;
    } else {
      $query = mysqli_query($this->conn, "INSERT INTO $table (" . implode(', ', array_keys($data)) . ") VALUES ('" . implode('\', \'', $data) . "')");
      if (mysqli_error($this->conn)) {
        return false;
      } else {
        return mysqli_insert_id($this->conn);
      }
    }
  }
  public function db_update($table, $data, $where)
  {
    $this->connect();
    if (!is_array($data)) {
      return false;
    } else {
      $update = "";
      $count = count($data);
      $i = 1;
      foreach ($data as $k => $v) {
        if ($i == $count) {
          $update .= $k . " = '" . $v . "'";
        } else {
          $update .= $k . " = '" . $v . "', ";
        }
        $i++;
      }
      $query = mysqli_query($this->conn, "UPDATE $table SET $update WHERE $where");
      if (mysqli_error($this->conn)) {
        return false;
      } else {
        return true;
      }
    }
  }
  public function db_delete($table, $where)
  {
    $this->connect();
    $query = mysqli_query($this->conn, "DELETE FROM $table WHERE $where");
    if ($query) {
      return true;
    } else {
      return false;
    }
  }
}
