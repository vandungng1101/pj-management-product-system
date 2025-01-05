<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductController extends Controller
{

   public function index()
   {
      return view('home');
   }

   public function listProducts()
   {
      ;

      $pro_model = new ProductModel();
      $cate_model = new CategoryModel();
      // $data['products'] = $pro_model->getAllProduct();
      $perPage = 4;
      $data['products'] = $pro_model->paginate($perPage);
      $data['categories'] = $cate_model->getAllCategory();
      $data['select'] = 0;

      
      $data['pager'] = $pro_model->pager;
      return view('product/index', $data);
   }

   public function createProduct()
   {
      $cate_model = new CategoryModel();
      $data['categories'] = $cate_model->getAllCategory();
      return view('product/create', $data);
   }

   public function addNewProduct()
   {
      $pro_model = new ProductModel();
      $cate_model = new CategoryModel();
      $categories = $cate_model->getAllCategory();

      $rules = [
         'name' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Tên sản phẩm không được để trống'
            ]
         ],
         'price' => [
            'rules' => 'required|numeric',
            'errors' => [
               'required' => 'Giá không được để trống',
               'numeric' => 'Giá phải là một số',
            ]
         ],
         'image' => [
            'rules' => 'uploaded[image]|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg]|max_size[image,2048]',
            'errors' => [
               'uploaded' => 'Bạn phải tải lên 1 tệp',
               'is_image' => 'File phải là ảnh',
               'mime_in' => 'File ảnh là png/jpg/jpeg',
               'max_size' => 'Kích thước ảnh tối đa 2MB',
            ]
         ]
      ];
      if (!$this->validate($rules)) {
         return view('product/create', [
            'validation' => $this->validator,
            'oldInput' => $this->request->getPost(),
            'categories' => $categories
         ],);
      }

      $image = $this->request->getFile('image');

      if ($image->isValid() && !$image->hasMoved()) {
         $name_image = $image->getRandomName();

         $image->move(ROOTPATH . "public/uploads", $name_image);
      }

      $data = [
         'cate_id' => $this->request->getPost('cate_id'),
         'pro_name' => $this->request->getPost('name'),
         'pro_desc' => $this->request->getPost('desc'),
         'price' => $this->request->getPost('price'),

         'image' => $name_image,
      ];

      $pro_model->addProduct($data);
      return redirect()->to('/product');
   }

   public function infoProduct($id)
   {
      $pro_model = new ProductModel();
      $cate_model = new CategoryModel();
      $data['product'] = $pro_model->getProduct($id);
      $data['categories'] = $cate_model->getAllCategory();
      return view('product/edit', $data);
   }

   public function saveProduct()
   {
      $pro_model = new ProductModel();
      $cate_model = new CategoryModel();

      $pro_id = $this->request->getPost('pro_id');

      $product = $pro_model->getProduct($pro_id);
      $categories = $cate_model->getAllCategory();

      $rules = [
         'name' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Tên sản phẩm không được để trống'
            ]
         ],
         'price' => [
            'rules' => 'required|numeric',
            'errors' => [
               'required' => 'Giá không được để trống',
               'numeric' => 'Giá phải là một số',
            ]
         ],
         'image' => [
            'rules' => 'is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg]|max_size[image,2048]',
            'errors' => [
               'is_image' => 'File phải là ảnh',
               'mime_in' => 'File ảnh là png/jpg/jpeg',
               'max_size' => 'Kích thước ảnh tối đa 2MB',
            ]
         ]
      ];
      if (!$this->validate($rules)) {
         return view('product/edit', [
            'validation' => $this->validator,
            'oldInput' => $this->request->getPost(),
            // khi có validate phải truyền lại mảng cho view
            'product' => $product,
            'categories' => $categories,
         ],);
      }

      $image = $this->request->getFile('image');
      if ($image->isValid() && !$image->hasMoved()) {
         $name_image = $image->getRandomName();

         $image->move(ROOTPATH . "public/uploads", $name_image);

         $data = [
            'pro_name' => $this->request->getPost('name'),
            'pro_desc' => $this->request->getPost('desc'),
            'price' => $this->request->getPost('price'),
            'cate_id' => $this->request->getPost('cate_id'),
            'image' => $name_image
         ];
      } else {
         $data = [
            'pro_name' => $this->request->getPost('name'),
            'pro_desc' => $this->request->getPost('desc'),
            'price' => $this->request->getPost('price'),
            'cate_id' => $this->request->getPost('cate_id'),
         ];
      }
      $pro_model->saveEditProduct($pro_id, $data);
      return redirect()->to('/product');
   }

   public function deleteProduct($id)
   {
      $pro_model = new ProductModel();
      $pro_model->deleteProduct($id);
      return redirect()->to('/product');
   }

   public function deleteAll()
   {
      $pro_model = new ProductModel();
      $pro_model->deleteAllProduct();
      return redirect()->to('/product');
   }

   public function searchProduct() {
      $pro_model = new ProductModel();
      $key = $this->request->getGet('search');

      // $data['products'] = $pro_model->like('pro_name', $key)->findAll();
      $perPage = 4;
      $data['products'] = $pro_model->like('pro_name', $key)->paginate($perPage);
      $data['pager'] = $pro_model->pager;

      $data['select'] = 0;

      return view('/product/index', $data);
   }

   public function filterProduct() {
      $pro_model = new ProductModel();
      $key = $this->request->getGet('filter');

      if($key == 0) {
         // $data['products'] = $pro_model->findAll();
         $perPage = 4;
         $data['products'] = $pro_model->paginate($perPage);
         $data['pager'] = $pro_model->pager;
         $data['select'] = 0;
      }
      
      if($key == 1) {
         // $data['products'] = $pro_model->orderBy('price', 'ASC')->findAll();

         $perPage = 4;
         $data['products'] = $pro_model->orderBy('price', 'ASC')->paginate($perPage);
         $data['pager'] = $pro_model->pager;

         $data['select'] = 1;
      }

      if($key == 2) {
         // $data['products'] = $pro_model->orderBy('price', 'DESC')->findAll();
         
         $perPage = 4;
         $data['products'] = $pro_model->orderBy('price', 'DESC')->paginate($perPage);
         $data['pager'] = $pro_model->pager;

         $data['select'] = 2;
      }

      return view('/product/index', $data);
   }
}
