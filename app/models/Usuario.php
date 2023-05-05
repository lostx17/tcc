<?php

namespace models;

class Usuario extends Model {

    protected $table = "usuarios";
    protected $fields = ["id","nome","dataNascimento","tipo","ativado"];
    
    public function findById($id){
        $stmt = $this->pdo->prepare("select * from {$this->table} where id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $stmt = $this->pdo->prepare("select * from {$this->table}");
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }

    public function save($data){
        #filtra, para que só tenha nos values os campos que realmente existem na tabela
        $values = array_intersect_key($data, array_flip($this->fields));
        $fields = array_keys($values);

        $sql = "INSERT INTO {$this->table} (".implode(",",$fields).") 
                    VALUES 
                (:".implode(",:",$fields).")";
        
        #caso voce queira ver como está o SQL descomente a linha
        #dd($sql);

        $stmt = $this->pdo->prepare($sql);
        if ($stmt->execute($values)) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }

    public function update($id, $data){
        #seta a ID
        $data["id"] = $id;

        #filtra, para que só tenha nos values os campos que realmente existem na tabela
        $values = array_intersect_key($data, array_flip($this->fields));
        $fields = array_keys($values);

        #constroi o SQL do UPDATE
        $sql ="UPDATE {$this->table} SET ";
        foreach($fields as $field){
            $sql .= "$field = :$field,";
        }
        $sql = trim($sql,",")." WHERE id = :id";

        #caso voce queira ver como está o SQL descomente a linha
        #dd($sql);
        
        $stmt = $this->pdo->prepare($sql);
        
        if ($stmt->execute($values)) {
            return $id;
        } else {
            return false;
        }
    }

    public function delete($id){
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(["id"=>$id]);
    }
    
}

