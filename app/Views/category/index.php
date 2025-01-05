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
        <a href="/home"><i class="fa-solid fa-left-long"></i></a>
        <h3 class="text-center">QUẢN LÝ LOẠI SẢN PHẨM</h3>
    </div>
    <div>
        <a href="/category/create" class="btn btn-primary mx-5 my-2"><i class="fa-solid fa-plus"></i> Thêm mới</a>
        <table class="table table-hover table-bordered mx-auto" style="width: 95%;">
            <tr class="table-dark">
                <th>ID</th>
                <th>NAME</th>
                <th>ACTION</th>
            </tr>
            <?php
                if(!empty($categories)) {
                    foreach($categories as $item) {
                        echo "<tr>
                                <td>".$item['cate_id']."</td>
                                <td>".$item['cate_name']."</td>
                                <td><a href='/category/edit/".$item['cate_id']."'><i class='fa-solid fa-pen-to-square'></i></a> || <a href='/category/delete/".$item['cate_id']."' onclick='return confirm(\"Bạn muốn xóa?\");'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>";
                    }
                }
                else {
                    echo " <tr>
                            <td colspan='3'> Danh sách rỗng</td>
                        </tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>