
<?php $khuvuon = json_decode($data['obj'],true) ?>
<div class="grid_10">
    <div class="box round first grid">
       <div class="block copyblock"> 
         <form action="admin/edit/khuvuon/<?= $khuvuon['Ma_khuvuon'] ?>" method="post">
            <table class="form">                    
                <tr>
                    <td>
                        <input type="text" placeholder="Mả Khu vườn"  value="<?= $khuvuon['Ma_khuvuon'] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" placeholder="Tên khu vườn" name="Ten_khuvuon" value="<?= $khuvuon['Ten_khuvuon'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" placeholder="Địa chỉ chi tiết" name="Diachi" value="<?= $khuvuon['Diachi'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <select id="Ma_tinh">
                            <option value="">Chọn Tỉnh-Thành</option>
                        <?php $tinhList = json_decode($data['attachLists']['tinh'],true); ?>
                        <?php foreach ($tinhList as $tinhobj): ?>
                            <option value="<?= $tinhobj['Ma_tinh'] ?>"><?= $tinhobj['Ten_tinh'] ?></option>
                        <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="Ma_huyen" id="Ma_huyen" >
                            <option value="">Chọn huyện</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="taikhoan_nql" value="admin">
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
<script type="text/javascript">
    function setDropdownList(list,key,val){
        var result = "";
        for(let i = 0 ; i < list.length; ++i){
            console.log(list[i]);
            result += "<option value=\""+list[i][key]+"\">"+list[i][val]+"</option></br>";
        }
        return result;
    }


      $(document).ready(function () {
        $("#Ma_tinh").change(function(even){
            val  = $(this).val();
            $.get("admin/getListByFK/huyen/"+val,function(data){
                list = $.parseJSON(data);
                $('#Ma_huyen').html('');
                $("#Ma_huyen").append(setDropdownList(list,"Ma_huyen","Ten_huyen"));    
            })
            
        });
      });
</script>
