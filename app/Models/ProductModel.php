<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
  protected $table = "product";
  protected $primaryKey = "pro_id";
  protected $allowedFields = ['pro_name', 'pro_desc', 'price', 'created_at', 'updated_at', 'cate_id', 'image'];
  protected $useTimestamps = true;

  public function getAllProduct()
  {
    return $this->findAll();
  }

  public function getProduct($id)
  {
    return $this->find($id);
    // return $this->where('pro_id', $id)->first();
  }

  public function addProduct($data)
  {
    return $this->insert($data);
  }

  public function saveEditProduct($id, $data)
  {
    return $this->update($id, $data);
  }

  public function deleteProduct($id)
  {
    return $this->delete($id);
  }

  public function deleteAllProduct()
  {
    return $this->truncate();
  }
}
