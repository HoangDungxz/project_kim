<?php

namespace SRC\Core;

use SRC\Core\ResourceModelInterface;
use SRC\Config\Database;
use PDO;
use SRC\helper\MSG;

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

    private $file_name;
    private $tmp_name;
    private $target_file;

    private $upload_value = [];



    public function __construct()
    {

        $this->class = str_replace("Resource", '', get_class($this));

        $this->model = new $this->class;

        $this->table = $this->model->getTable_name();
        $this->id = $this->model->getTable_id();
        $this->model->unsetPrepareTable();
    }


    public function where($column, $value, $conditionType = "AND")
    {
        $column =  str_replace(" ", "", $column);
        $column_parameter = str_replace(".", "_", $column);
        switch ($this->conditionSql) {
            case ' ':
                $this->conditionSql .= " WHERE $column = :$column_parameter ";
                $this->params =   array_merge($this->params, [$column_parameter => $value]);
                break;
            default:
                $this->conditionSql .= " $conditionType $column = :$column_parameter ";
                $this->params =   array_merge($this->params, [$column_parameter => $value]);
                break;
        }
        return $this;
    }

    public function like($column, $value, $conditionType = "AND")
    {
        $column_parameter = str_replace([".", " "], "_", $column);

        switch ($this->conditionSql) {
            case ' ':
                $this->conditionSql .= " WHERE $column like :$column_parameter ";
                $this->params =   array_merge($this->params, [$column_parameter => "%$value%"]);
                break;
            default:
                $this->conditionSql .= "  $conditionType $column like :$column_parameter ";
                $this->params =   array_merge($this->params, [$column_parameter => "%$value%"]);
                break;
        }
        return $this;
    }

    public function between($column, $value, $conditionType = "AND")
    {
        $column_parameter = str_replace(".", "_", $column);

        $valueArr = explode("-", $value);
        switch ($this->conditionSql) {
            case ' ':
                $this->conditionSql .= " WHERE $column BETWEEN :$column_parameter" . "_between_1 AND :$column_parameter" . "_between_2";;
                $this->params =   array_merge($this->params, [
                    $column_parameter . "_between_1" => $valueArr[0],
                    $column_parameter . "_between_2" => $valueArr[1],

                ]);
                break;
            default:
                $this->conditionSql .= "  $conditionType $column BETWEEN :$column_parameter" . "_between_1 AND :$column_parameter" . "_between_2";;
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

                if (isset($model->parent_id) && call_user_func(array($model, "get" . ucfirst($model->parent_id))) == null) {
                    $arrayModel[$model->parent_id] = $lastInsertId;
                }

                if ($id == null) {
                    $sql = "INSERT INTO $table_name  SET $stringModel";
                } else {
                    $sql = "UPDATE $table_name SET $stringModel WHERE  $table_id = $id";
                }


                $req->prepare($sql)
                    ->execute($arrayModel);

                if (isset($model->send_id_to_child) && $model->send_id_to_child == true) {
                    $lastInsertId = $req->lastInsertId();
                }
            }
            $req->commit();

            if (count($this->upload_value) > 0) {
                $this->runUpload();
            }

            return true;
        } catch (\PDOException $e) {

            echo $e->getMessage();
            die;
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
            echo $e->getMessage();
            $req->rollback();
            print "Error!: " . $e->getMessage() . "</pre>";
            return false;
        } finally {
            $this->deleteModels = [];
        }
    }


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

    public function upload($file, $target_dir = false)
    {
        if ($target_dir === false) {
            $target_dir = $this->table;
        }

        $now = new \DateTime('now', new \DateTimeZone('Asia/Ho_Chi_Minh'));
        $file_name = $now->format('Y_m_d_H_i_s') . '_' . random_int(1000, 9999);

        $uploadOk = true;

        $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $file_name .= '.' . $imageFileType;

        $target_file = 'assets/upload/' . $target_dir . './' . $file_name;

        $check = getimagesize($file["tmp_name"]);

        if ($check !== false) {
            // MSG::send("File là 1 ảnh - " . $check["mime"] . ".", 'success');
            $uploadOk = 1;
        } else {
            MSG::send("File không phải là 1 ảnh.");
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            MSG::send("File đã tồn tại!");
            $uploadOk = 0;
        }


        if ($file["size"] > 1500000) {
            MSG::send("Dung lượng file phải nhỏ hơn 1500000!");
            $uploadOk = 0;
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            MSG::send("File phải là đuôi JPG, JPEG, PNG & GIF!");
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            MSG::send("Sorry, ảnh tải lên không thành công");
            // if everything is ok, try to upload file
        } else {

            array_push($this->upload_value, [
                'file_name' => $file_name,
                'tmp_name' => $file["tmp_name"],
                'target_file' => $target_file
            ]);

            return $file_name;
        }
    }

    private function runUpload()
    {
        foreach ($this->upload_value as  $u) {
            if (move_uploaded_file($u['tmp_name'], $u['target_file'])) {
                MSG::send("Ảnh " . htmlspecialchars(basename($u['file_name'])) . " đã được tải lên.", 'success');
            } else {
                MSG::send("Sorry, ảnh tải lên không thành công.");
            }
        }
    }

    public function deleteImage($images, $target_dir = false)
    {
        if ($target_dir === false) {
            $target_dir = $this->table;
        }
        $target_file = 'assets/upload/' . $target_dir . './' . $images;

        if (file_exists($target_file)) {
            if (unlink($target_file)) {
                return true;
            }
        }
        return false;
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