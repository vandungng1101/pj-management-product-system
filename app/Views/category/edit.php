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
            <a href="/category"><i class="fa-solid fa-left-long"></i></a>
            <h3 class="text-center mt-2">THÔNG TIN SẢN PHẨM</h3>
    </div>
    <div style="width: 25%;" class="mx-auto rounded-3">
        <form action="/category/save-edit" method="post" class="bg-info rounded-3 p-3">
            <input type="hidden" name="cate_id" value="<?= $category['cate_id']; ?>">
            <div class="">
                <label class="form-label">Tên loại sản phẩm: </label>
                <input type="text" name="cate_name" id="" class="form-control" value="<?= old('cate_name', isset($oldInput['cate_name']) ? $oldInput['cate_name'] : $category['cate_name']); ?>">
                <?php
                    if(isset($validation) && $validation->hasError('cate_name')) {
                        echo "<p class='text-danger'>".$validation->getError('cate_name')."</p>";
                    }
                ?>
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
</body>
</html>