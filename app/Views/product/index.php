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
        <h3 class="text-center">QUẢN LÝ SẢN PHẨM</h3>
    </div>
    <div>
        <a href="/create" class="btn btn-primary mx-5 my-2"><i class="fa-solid fa-plus"></i> Thêm mới</a>
        <table class="table table-hover table-bordered mx-auto" style="width: 95%;">
            <tr class="text-center table-dark">
                <th>ID</th>
                <th>NAME</th>
                <th>DESC</th>
                <th>PRICE</th>
                <th>IMAGE</th>
                <th>ACITON</th>
            </tr>
            <?php 
                
                if(!empty($products)) {
                    foreach($products as $item) {
                        $img = base_url('uploads/'. $item['image']);
                        echo "<tr class='text-center align-middle'>
                                <td>".$item['pro_id']."</td>
                                <td>".$item['pro_name']."</td>
                                <td>".$item['pro_desc']."</td>
                                <td>".$item['price']."</td>
                                <td><img src='".$img."' width=100px'></td>
                                <td><a href='/edit/".$item['pro_id']."'><i class='fa-solid fa-pen-to-square'></i></a> || <a href='/delete/".$item['pro_id']."' onclick='return confirm(\"Bạn muốn xóa?\");'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>";
                    }
                }
                else {
                    echo "<tr class='text-center'>  
                        <td colspan='6' class='text-center'>Danh sách rỗng</td>
                    </tr>";
                }
            ?>
        </table>
        <a href="/delete-all" class="mx-5 mb-3 btn btn-warning" onclick=" return confirm('Bạn muốn xóa tất cả?');"><i class="fa-solid fa-trash"></i> Xóa tất cả danh sách</a>
    </div>
</body>
</html>