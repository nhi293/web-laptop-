<?php
include '../../html_backend/productClass.php';
$productClass = new productClass;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- PopperJS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <style>
        .wrapped {
            margin-top: 20% auto;
            width: 60%;
            text-align: center;
        }

        #displayImg {
            width: 220px;
            height: 220px;
            object-fit: cover;
        }
    </style>

    <title>Thêm Sản Phẩm</title>
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $insert_product = $productClass->insert_product($data);
    print_r($_FILES);
}
?>
<?php
$selectAll = $productClass->select_product_All();
?>

<body>

    <div class="main-content">
        <h3 class="title-page">
            Thêm sản phẩm
        </h3>

        <form class="addPro" action="/html_backend/themsanpham.php" method="POST" enctype="multipart/form-data">
            <!-- Nhập ảnh sản phẩm -->
            <!-- <div class="form-group">
                        <label for="exampleInputFile">Ảnh sản phẩm</label>
                        <div class="custom-file">
                            <input type="file" name="product_image" class="custom-file-input" id="exampleInputFile">
                        </div>
                    </div> -->
            <div class="form-group wrapper">
                <label for="exampleInputFile">Ảnh sản phẩm</label>
                <input type="file" name="product_image" class="custom-file-input" id="upload" onchange="ImagesFileAsURL()" /> <br>
                <img id="displayImg" alt="">
                <script type="text/javascript">
                    function ImagesFileAsURL() {
                        var fileSelected = document.getElementById('upload').files;
                        if (fileSelected.length > 0) {
                            var fileToLoad = fileSelected[0];
                            var fileReader = new FileReader();
                            fileReader.onload = function(fileLoaderEvent) {
                                var srcData = fileLoaderEvent.target.result;
                                document.getElementById('displayImg').src = srcData;
                            }
                            fileReader.readAsDataURL(fileToLoad);
                        }
                    }
                </script>
            </div>
            <!-- Nhập tên sản phẩm -->
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm">
            </div>

            <!-- Nhập danh mục -->
            <div class="form-group">
                <label for="categories">Danh mục:</label>
                <input type="text" class="form-control" name="categories" id="categories" placeholder="Nhập danh mục">
            </div>

            <!-- Nhập số lượng tồn kho -->
            <div class="form-group">
                <label for="stock">Số lượng tồn kho:</label>
                <input type="number" class="form-control" name="stock" id="stock" placeholder="Nhập số lượng tồn kho">
            </div>

            <!-- Nhập giá -->
            <div class="form-group">
                <label for="price">Giá:</label>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="price" id="price" class="form-control" placeholder="Nhập giá gốc">
                </div>
            </div>

            <!-- Nhập màn hình -->
            <div class="form-group">
                <label for="man_hinh">Màn hình:</label>
                <input type="text" class="form-control" name="man_hinh" id="man_hinh" placeholder="Nhập màn hình">
            </div>

            <!-- Nhập CPU -->
            <div class="form-group">
                <label for="cpu">CPU:</label>
                <input type="text" class="form-control" name="cpu" id="cpu" placeholder="Nhập CPU">
            </div>

            <!-- Nhập RAM -->
            <div class="form-group">
                <label for="ram">RAM:</label>
                <input type="text" class="form-control" name="ram" id="ram" placeholder="Nhập RAM">
            </div>

            <!-- Nhập lưu trữ -->
            <div class="form-group">
                <label for="luu_tru">Lưu trữ:</label>
                <input type="text" class="form-control" name="luu_tru" id="luu_tru" placeholder="Nhập lưu trữ">
            </div>

            <!-- Nhập pin -->
            <div class="form-group">
                <label for="pin">Pin:</label>
                <input type="text" class="form-control" name="pin" id="pin" placeholder="Nhập pin">
            </div>

            <!-- Nút submit -->
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>

    <script>
        new DataTable('#example');
    </script>
    </div>
    </div>
</body>

</html>