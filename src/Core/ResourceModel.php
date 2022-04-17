<?php

namespace SRC\Core;

use SRC\Core\ResourceModelInterface;
use SRC\Config\Database;
use PDO;

class ResourceModel  implements ResourceModelInterface
{

    protected $table;
    protected $id;
    protected $model;

    private $oderSql;
    private $paginateSql;
    private $conditionSql = ' ';
    private $joinSql;
    private $select = '*';
    private $params = [];
    private $groupBySql;

    function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function where($column, $value)
    {
        $column_parameter = str_replace(".", "_", $column);
        switch ($this->conditionSql) {
            case ' ':
                $this->conditionSql .= " WHERE $column = :$column_parameter ";
                $this->params =   array_merge($this->params, [$column_parameter => $value]);
                break;
            default:
                $this->conditionSql .= " AND $column = :$column_parameter ";
                $this->params =   array_merge($this->params, [$column_parameter => $value]);
                break;
        }
        return $this;
    }

    public function like($column = '', $value)
    {
        $column_parameter = str_replace(".", "_", $column);

        switch ($this->conditionSql) {
            case ' ':
                $this->conditionSql .= " WHERE $column like :$column_parameter ";
                $this->params =   array_merge($this->params, [$column_parameter => "%$value%"]);
                break;
            default:
                $this->conditionSql .= " AND $column like :$column_parameter ";
                $this->params =   array_merge($this->params, [$column_parameter => "%$value%"]);
                break;
        }
        return $this;
    }

    public function between($column, $value)
    {
        $column_parameter = str_replace(".", "_", $column);

        $valueArr = explode(",", $value);
        switch ($this->conditionSql) {
            case ' ':
                $this->conditionSql .= " WHERE $column BETWEEN :$column_parameter" . "_between_1 AND :$column_parameter" . "_between_2";;
                $this->params =   array_merge($this->params, [
                    $column_parameter . "_between_1" => $valueArr[0],
                    $column_parameter . "_between_2" => $valueArr[1],

                ]);
                break;
            default:
                $this->conditionSql .= " AND $column BETWEEN :$column_parameter" . "_between_1 AND :$column_parameter" . "_between_2";;
                $this->params =   array_merge($this->params, [
                    $column_parameter . "_between_1" => $valueArr[0],
                    $column_parameter . "_between_2" => $valueArr[1],
                ]);
                break;
        }
        return $this;
    }

    public function join($tableJoin, $condition, $joinType = 'JOIN')
    {
        $this->joinSql .= " $joinType $tableJoin ON $condition ";
        return $this;
    }
    public function groupBy($groupBy)
    {
        $this->groupBySql = "GROUP BY $groupBy";
        return $this;
    }

    public function select($select)
    {
        $this->select = "$select";
        return $this;
    }

    public function order($column, $direction)
    {
        $this->oderSql = " ORDER BY $column $direction ";
        return $this;
    }

    public function paginate($page = 1, $recordPerPage = 20)
    {
        $page = $page > 0 ? $page - 1 : 0;
        $from = $page * $recordPerPage;
        $this->paginateSql = " LIMIT $from, $recordPerPage";
        return $this;
    }

    public function getAll($params = [])
    {
        $sql = "SELECT $this->select FROM $this->table $this->joinSql $this->conditionSql $this->groupBySql $this->oderSql $this->paginateSql";

        $req = Database::getBdd()->prepare($sql);
        $req->execute($this->params);

        // echo '<pre>';

        // // print_r($req->fetchAll(PDO::FETCH_CLASS, get_class($this->model)));
        // // echo '</pre>';

        // echo '<pre>';
        // print_r($this->params);
        // echo '</pre>';
        $this->clearSelectSql();

        return ($req->fetchAll(PDO::FETCH_CLASS, get_class($this->model)));
    }

    public function get($params = [])
    {

        $sql = "SELECT $this->select FROM $this->table $this->joinSql $this->conditionSql $this->groupBySql $this->oderSql $this->paginateSql";

        $req = Database::getBdd()->prepare($sql);
        $req->execute($this->params);

        $this->clearSelectSql();

        return $req->fetchObject(get_class($this->model));
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->id = $id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute($this->params);

        $this->clearSelectSql();

        return $req->fetchObject(get_class($this->model));
    }

    private function clearSelectSql()
    {
        $this->oderSql = ' ';
        $this->paginateSql = '';
        $this->conditionSql = ' ';
        $this->joinSql = ' ';
        $this->select = '*';
        $this->params = [];
        $this->groupBySql = '';
    }

    public function save($model)
    {
        $arrayModel = $model->getProperties($this->model);
        $stringModel = implode($arrayModel);

        $id = $arrayModel['id'];

        if ($id == null) {
            $sql = "INSERT INTO $this->table SET $stringModel";
        } else {
            $sql = "UPDATE $this->table SET $stringModel WHERE $this->id = $id";
        }
        $req = Database::getBdd()->prepare($sql);
        return $req->execute($arrayModel);
    }

    public function detele($id)
    {
        $sql = "DELETE * FROM $this->table WHERE $this->id = $id";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }


    // SESSION

    public function saveSession($model)
    {
        $_SESSION[$this->table] = $model;
    }
    public function getSession()
    {
        if (isset($_SESSION[$this->table])) {
            return $_SESSION[$this->table];
        }
        return null;
    }
    public function remove()
    {
        if (isset($_SESSION[$this->table])) {
            $_SESSION[$this->table] = null;
            return true;
        }
        return false;
    }
}
