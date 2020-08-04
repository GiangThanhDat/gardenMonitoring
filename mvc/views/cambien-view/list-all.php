   
       <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
          <thead>
            <tr>
              <th>Mả cảm biến</th>
              <th>Tên cảm biến</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $cambienList = json_decode($data['myList'],true); ?>
            <?php foreach ($cambienList as $cambien): ?>
              <tr class="odd gradeX">
                <td><?= $cambien['Ma_cambien'] ?></td>
                <td><?= $cambien['Ten_cambien'] ?></td>
                <td><a href="admin/edit/cambien/<?= $cambien['Ma_cambien'] ?>">Edit</a> || <a href="admin/del/cambien/<?= $cambien['Ma_cambien'] ?>">Delete</a></td>
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
