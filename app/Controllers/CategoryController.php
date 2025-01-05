<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
  public function index()
  {
    $model = new CategoryModel();
    $data['categories'] = $model->getAllCategory();

    return view('category/index', $data);
  }

  public function createCate()
  {
    return view('category/create');
  }

  public function saveCreateCate()
  {
    $model = new CategoryModel();

    $rules = [
      'cate_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tên loại sản phẩm không được rỗng',
        ],
      ]
    ];

    if (!$this->validate($rules)) {
      return view('category/create', [
        'validation' => $this->validator,
        'oldInput' => $this->request->getPost(),
      ]);
    }

    $data = [
      'cate_name' => $this->request->getPost('cate_name'),
    ];

    $model->addCategory($data);

    return redirect()->to('/category');
  }

  public function editCate($id)
  {
    $model = new CategoryModel();
    $data['category'] = $model->getCategory($id);
    return view('category/edit', $data);
  }

  public function saveEditCate()
  {
    $model = new CategoryModel();
    $cate_id = $this->request->getPost('cate_id');

    $rules = [
      'cate_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tên loại sản phẩm không được rỗng',
        ],
      ]
    ];

    if (!$this->validate($rules)) {
      return view('category/create', [
        'validation' => $this->validator,
        'oldInput' => $this->request->getPost(),
      ]);
    }

    $data = [
      'cate_name' => $this->request->getPost('cate_name'),
    ];

    $model->updateCategory($cate_id, $data);

    return redirect()->to('/category');
  }

  public function deleteCate($id)
  {
    $model = new CategoryModel();
    $model->deleteCategory($id);
    return redirect()->to('/category');
  }
}
