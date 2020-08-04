
<?php $tinh = json_decode($data['obj'],true);?>
<div class="grid_10">
    <div class="box round first grid">
       <div class="block copyblock"> 
         <form action="admin/edit/tinh/<?= $tinh['Ma_tinh'] ?>" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" placeholder="Nhập tên cảm biến" class="medium" name="Ten_tinh" value="<?= $tinh['Ten_tinh'] ?>" />
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
