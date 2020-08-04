
<?php $cambien = json_decode($data['obj'],true);?>
<div class="grid_10">
    <div class="box round first grid">
       <div class="block copyblock"> 
         <form action="admin/edit/cambien/<?= $cambien['Ma_cambien'] ?>" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" placeholder="Nhập tên cảm biến" class="medium" name="Ten_cambien" value="<?= $cambien['Ten_cambien'] ?>" />
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
