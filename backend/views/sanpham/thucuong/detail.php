<?php require_once 'views/layout/header.php'?>
<div class="content-wrapper" style="margin-left: 230px">
    <section class="content-header">
        <h2>Đồ uống</h2>
    </section>
<?php if(!empty($drink)):?>
<h3>Thông tin chi tiết sản phẩm ID = <?php echo $drink['ID']?></h3>
<table class="table table-borderd">
    <tr >
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Tên tiếng Anh</th>
        <th>Hình ảnh</th>
        <th>Giá sản phẩm</th>
        <th style="text-align: center">Miêu tả</th>
        <th>Trạng thái</th>
        <th>Thời gian tạo</th>
    </tr>
    <tr>
        <td><?php echo $drink['ID']?></td>
        <td><?php echo $drink['Name']?></td>
        <td><?php echo $drink['NameEnglish']?></td>
        <td>
            <?php if(!empty($drink['Img'])):?>
            <img id="img_description" src="assets/uploads/<?php echo $drink['Img']?>"
            <?php endif;?>
        </td>
        <td><?php echo $drink['Price']?></td>
        <td><?php echo $drink['Descripton']?></td>
        <td>
            <?php if($drink['Status'] == 1){
                echo 'Enabled';
            }
            else{
                echo 'Disabled';
            }
            ?>

        </td>
        <td><?php echo $drink['Created_at']?></td>
    </tr>

</table>
<?php else:?>
<h3>Không tìm thấy dữ liệu</h3>
<?php endif;?>


</div>
<?php require_once 'views/layout/footer.php'?>