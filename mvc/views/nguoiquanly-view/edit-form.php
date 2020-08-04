
<?php $huyen = json_decode($data['obj'],true);?>
<div class="grid_10">
    <div class="box round first grid">
       <div class="block copyblock"> 
         <form action="admin/edit/huyen/<?= $huyen['Ma_huyen'] ?>" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" placeholder="Nhập tên cảm biến" class="medium" name="Ten_huyen" value="<?= $huyen['Ten_huyen'] ?>" />
                    </td>
                </tr>
				<tr> 
                    <td>
                        <input type="submit" Value="Lưu" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
