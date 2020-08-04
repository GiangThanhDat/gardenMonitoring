<!-- <?php print_r($data) ?> -->
<div class="grid_10">
    <div class="box round first grid">
       <div class="block copyblock"> 
         <form action="admin/add/dailuong" method="post">
            <table class="form">
            	<tr>
                    <th>
                        <p>Mả đại lượng</p>
                    </th>
                    <td>
                        <input type="number" name="Ma_dailuong" placeholder="Mả đại lượng">
                    </td>   
                </tr>			
                <tr>
                    <th>
                        <p>Tên đại lượng</p>
                    </th>
                    <td>
                        <input type="text" placeholder="Nhập đại lượng" class="medium" name="Ten_dailuong" />
                    </td>
                </tr>
                <tr>
                    <th>
                        <p>Đơn vị đo</p>
                    </th>
                    <td>
                        <select name="Ma_donvido">
                            <?php $donvidoList = json_decode($data['attachLists']['donvido'],true); ?>
                            <?php foreach ($donvidoList as $donvi): ?>
                                <option value="<?= $donvi['Ma_donvido'] ?>"><?= $donvi['Ten_donvido'] ?></option>
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
