       <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
          <thead>
            <tr>
              <th>Mả Huyện</th>
              <th>Tên Huyện</th>
              <th>Thuộc Tỉnh</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $huyenList = json_decode($data['myList'],true);
             ?>
            <?php foreach ($huyenList as $huyen): ?>
              <tr class="odd gradeX">
                <td><?= $huyen['Ma_huyen'] ?></td>
                <td><?= $huyen['Ten_huyen'] ?></td>
                <td><?= $huyen['Ten_tinh'] ?></td>
                <td><a href="admin/edit/huyen/<?= $huyen['Ma_huyen'] ?>">Edit</a> || <a href="admin/del/huyen/<?= $huyen['Ma_huyen'] ?>">Delete</a></td>
            </tr>
            <?php endforeach ?>

          </tbody>
        </table>
               </div>
            </div>
        </div>
<script type="text/javascript">
  $(document).ready(function () {
      setupLeftMenu();

      $('.datatable').dataTable();
      setSidebarHeight();
  });
</script>
