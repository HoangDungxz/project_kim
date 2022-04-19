<?php

namespace SRC\Core;

use SRC\Core\ResourceModelInterface;
use SRC\Config\Database;
use PDO;

class ResourceModel  implements ResourceModelInterface
{

    protected $table;
    protected $id;
    protected $class;
    protected $model;

    private $oderSql;
    private $paginateSql;
    private $conditionSql = ' ';
    private $joinSql;
    private $select = '*';
    private $params = [];
    private $groupBySql;


    public function __construct()
    {

        $this->class = str_replace("Resource", '', get_class($this));

        $this->model = new $this->class;



        $this->table = $this->model->getTable_name();
        $this->id = $this->model->getTable_id();
        $this->model->unsetPrepareTable();
    }


    public function where($column, $value)
    {
        $column =  str_replace(" ", "", $column);
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
        $column_parameter = str_replace([".", " "], "_", $column);

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
    public function setFetchClass($class)
    {
        $this->class = $class;
        return $this;
    }

    public function getAll($params = [])
    {
        $table_name = $this->model->getTable_name();
        $sql = "SELECT $this->select FROM $table_name $this->joinSql $this->conditionSql $this->groupBySql $this->oderSql $this->paginateSql";
        $req = Database::getBdd()->prepare($sql);
        $req->execute($this->params);
        $this->clearSelectSql();

        return ($req->fetchAll(PDO::FETCH_CLASS, $this->class));
    }

    public function get($params = [])
    {
        $table_name = $this->model->getTable_name();
        $sql = "SELECT $this->select FROM $table_name $this->joinSql $this->conditionSql $this->groupBySql $this->oderSql $this->paginateSql";

        $req = Database::getBdd()->prepare($sql);
        $req->execute($this->params);
        $this->clearSelectSql();

        return ($req->fetchObject(get_class($this->model)));
    }

    public function getById($id)
    {
        $table_name = $this->model->getTable_name();

        $sql = "SELECT * FROM $table_name WHERE $this->id = $id";

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

    public function save(...$models)
    {
        $req = Database::getBdd();
        try {
            $req->beginTransaction();
            $lastInsertId = 0;
            foreach ($models as $key => $model) {

                $arrayModel = $model->getProperties($model);

                $table_name = $model->getTable_name();
                $table_id = $model->getTable_id();
                $id = $model->get($table_id);

                $stringModel = '';

                unset($arrayModel[$table_id]);

                foreach ($arrayModel as $key => $value) {
                    $stringModel .= " $key = :$key ,";
                }

                $stringModel = rtrim($stringModel, ',');

                if (isset($model->parent_id) && $model->getOrder_id() == null) {
                    $arrayModel[$model->parent_id] = $lastInsertId;
                }

                if ($id == null) {
                    $sql = "INSERT INTO $table_name  SET $stringModel";
                } else {
                    $sql = "UPDATE $table_name SET $stringModel WHERE  $table_id = $id";
                }

                $req->prepare($sql)
                    ->execute($arrayModel);


                echo '<pre>';
                print_r($model);
                echo '</pre>';
                if (isset($model->send_id_to_child) && $model->send_id_to_child == true) {
                    $lastInsertId = $req->lastInsertId();
                }
            }
            $req->commit();

            return true;
        } catch (\PDOException $e) {
            $req->rollback();
            print "Error!: " . $e->getMessage() . "</pre>";
            return false;
        }
    }


    public function delete(...$models)
    {

        $req = Database::getBdd();
        try {
            $req->beginTransaction();
            foreach ($models as  $model) {

                $table_name = $model->getTable_name();
                $table_id = $model->getTable_id();
                $id = $model->get($table_id);

                $sql = "DELETE FROM $table_name WHERE $table_id = $id";

                $req->prepare($sql)->execute();
            }
            $req->commit();
            return true;
        } catch (\PDOException $e) {
            $req->rollback();
            print "Error!: " . $e->getMessage() . "</pre>";
            return false;
        } finally {
            $this->deleteModels = [];
        }
    }

    // public function createDelete(...$model)
    // {
    //     foreach ($model as $key => $value) {
    //         array_push($this->deleteModels, $value);
    //     }
    //     return $this;
    // }

    protected function includeImage($pid)
    {
        $images = $this->imageResoureModel
            ->where('product_id', $pid)
            ->getAll();

        $paths = [];
        if (count($images) <= 0) {
            $paths = ["default-product-image.png", "default-product-image.png"];
        } else if (count($images) <= 1) {
            $paths = [$images[0]->getPath(), $images[0]->getPath()];;
        } else {
            foreach ($images as $i) {
                array_push($paths, $i->getPath());
            }
        }

        return $paths;
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
