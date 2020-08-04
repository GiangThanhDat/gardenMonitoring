   
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
            <?php $donvidoList = json_decode($data['myList'],true); ?>
            <?php foreach ($donvidoList as $donvido): ?>
              <tr class="odd gradeX">
                <td><?= $donvido['Ma_donvido'] ?></td>
                <td><?= $donvido['Ten_donvido'] ?></td>
                <td><a href="admin/edit/donvido/<?= $donvido['Ma_donvido'] ?>">Edit</a> || <a href="admin/del/donvido/<?= $donvido['Ma_donvido'] ?>">Delete</a></td>
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
