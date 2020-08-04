
<?php $dailuongdo = json_decode($data['obj'],true);?>

<div class="grid_10">
    <div class="box round first grid">
       <div class="block copyblock"> 
         <form action="admin/edit/dailuong/<?= $dailuongdo['Ma_dailuong'] ?>" method="post">
            <table class="form">					
                <tr>
                    <td>Mả:</td>
                    <td>
                        <input type="text" class="medium" name="Ma_dailuong" value="<?= $dailuongdo['Ma_dailuong'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Tên:</td>
                    <td>
                        <input type="text" class="medium" name="Ten_dailuong" value="<?= $dailuongdo['Ten_dailuong'] ?>">
                    </td> 
                </tr>
                <tr>
                    <td>Chọn đơn vị:</td>
                    <td>
                        <select class="medium" name="ma_donvido" >
                            <?php $donviList = json_decode($data['attachLists']['donvido'],true); ?>
                            <?php foreach ($donviList as $donvi): ?>
                                <option value="<?= $donvi['Ma_donvido'] ?>"> <?= $donvi['Ten_donvido'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Chọn mức cảnh báo</td>
                    <td>
                        <input class="medium" type="number" placeholder="Mức cảnh báo" name="muc_canh_bao" value="<?= $dailuongdo['muc_canh_bao'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Chọn màu</td>
                    <td>
                        <input class="medium" type="color" placeholder="Màu Cảnh Báo" name="mau_canh_bao" value="<?= $dailuongdo['mau_canh_bao'] ?>">
                    </td>
                </tr>
				<tr> 
                    <td>
                        <input class="medium" type="submit" Value="Lưu" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
