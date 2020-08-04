<!-- <?php print_r($data) ?>    -->
       <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
          <thead>
            <tr>
              <th>Mả đơn vị</th>
              <th>Tên đơn vị</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $tinhList = json_decode($data['myList'],true); ?>
            <?php foreach ($tinhList as $tinh): ?>
              <tr class="odd gradeX">
                <td><?= $tinh['Ma_tinh'] ?></td>
                <td><?= $tinh['Ten_tinh'] ?></td>
                <td><a href="admin/edit/tinh/<?= $tinh['Ma_tinh'] ?>">Edit</a> || <a href="admin/del/tinh/<?= $tinh['Ma_tinh'] ?>">Delete</a></td>
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
