<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <div class="m-4">
        <a href="/product"><i class="fa-solid fa-left-long"></i></a>
        <h3 class="text-center mt-2">THÊM MỚI SẢN PHẨM</h3>
    </div>
    <form action="/add-new" method="post" style="width: 25%;" class="bg-info rounded-3 p-2 mx-auto my-3" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div>
            <label class="form-label">Tên sản phẩm: </label>
            <input type="text" name="name" id="" class="form-control" value="<?= old('name', isset($oldInput['name']) ? $oldInput['name'] : ''); ?>">
            <?php
                if(isset($validation) && $validation->hasError('name')) {
                    echo "<p class='text-danger'>". $validation->getError('name') ."</p>";
                }
            ?>
        </div>
        <div>
            <label class="form-label">Loại sản phẩm: </label>
            <select name="cate_id" id="" class="form-select">
                <option value="">-- Tên loại sản phẩm --</option>
                <?php
                    if(!empty($categories)) {
                        foreach($categories as $item) {
                            echo "<option value='".$item['cate_id']."'>".$item['cate_name']."</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div>
            <label class="form-label">Mô tả sản phẩm: </label>
            <input type="text" name="desc" id="" class="form-control" value="<?= old('desc', isset($oldInput['desc']) ? $oldInput['desc'] : ''); ?>">
            <?php
                if(isset($validation) && $validation->hasError('desc')) {
                    echo "<p class='text-danger'>". $validation->getError('desc') ."</p>";
                }
            ?>
        </div>
        <div>
            <label class="form-label">Giá sản phẩm: </label>
            <input type="text" name="price" id="" class="form-control" value="<?= old('price', isset($oldInput['price']) ? $oldInput['price'] : ''); ?>">
            <?php
                if(isset($validation) && $validation->hasError('price')) {
                    echo "<p class='text-danger'>". $validation->getError('price') ."</p>";
                }
            ?>
        </div>
        <div>
            <label class="form-label">Ảnh sản phẩm: </label>
            <input type="file" name="image" id="" class="form-control" value="<?= old('image', isset($oldInput['image']) ? $oldInput['image'] : ''); ?>">
            <?php
                if(isset($validation) && $validation->hasError('image')) {
                    echo "<p class='text-danger'>". $validation->getError('image') ."</p>";
                }
            ?>
        </div>
        <hr>
        <button type="submit" class="btn btn-success">Tạo mới</button>
        <button type="reset" class="btn btn-secondary">Đặt lại</button>
    </form>
</body>
</html>