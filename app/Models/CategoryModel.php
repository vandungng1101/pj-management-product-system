<?php

    namespace App\Models;

   use CodeIgniter\Model;

   class CategoryModel extends Model {
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    protected $allowedFields = ['cate_name', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getAllCategory() {
        return $this->findAll();
    }

    public function getCategory($id) {
        return $this->find($id);
    }

    public function addCategory($data) {
        return $this->insert($data);
    }

    public function updateCategory($id, $data) {
        return $this->update($id, $data);
    }

    public function deleteCategory($id) {
        return $this->delete($id);
    }
   }