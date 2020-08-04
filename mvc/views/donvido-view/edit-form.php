<!-- <?php print_r($data) ?> -->
<?php $donvido = json_decode($data['obj'],true);?>
<div class="grid_10">
    <div class="box round first grid">
       <div class="block copyblock"> 
         <form action="admin/edit/donvido/<?= $donvido['Ma_donvido'] ?>" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" placeholder="Nhập tên cảm biến" class="medium" name="Ten_donvido" value="<?= $donvido['Ten_donvido'] ?>" />
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
