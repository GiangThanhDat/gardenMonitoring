   <!-- <?php print_r($data) ?> -->
       <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
          <thead>
            <tr>
              <th>Mã Đại Lượng</th>
              <th>Tên Đại Lượng</th>
              <th>Thuộc Tỉnh</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $dailuongList = json_decode($data['myList'],true);
             ?>
            <?php foreach ($dailuongList as $dailuong): ?>
              <tr class="odd gradeX">
                <td><?= $dailuong['Ma_dailuong'] ?></td>
                <td><?= $dailuong['Ten_dailuong'] ?></td>
                <td><?= $dailuong['Ten_donvido'] ?></td>
                <td><a href="admin/edit/dailuong/<?= $dailuong['Ma_dailuong'] ?>">Edit</a> || <a href="admin/del/dailuong/<?= $dailuong['Ma_dailuong'] ?>">Delete</a></td>
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
