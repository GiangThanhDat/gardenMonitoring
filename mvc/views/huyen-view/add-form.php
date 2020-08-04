
<div class="grid_10">
    <div class="box round first grid">
       <div class="block copyblock"> 
         <form action="admin/add/huyen" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" placeholder="Nhập tên huyện" class="medium" name="Ten_huyen" />
                    </td>
                    <td>
                        <select name="Ma_tinh">
                            <?php $huyenList = json_decode($data['attachLists']['tinh'],true); ?>
                            <?php foreach ($huyenList as $huyen): ?>
                                <option value="<?= $huyen['Ma_tinh'] ?>"><?= $huyen['Ten_tinh'] ?></option>
                            <?php endforeach ?>
                        </select>
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
