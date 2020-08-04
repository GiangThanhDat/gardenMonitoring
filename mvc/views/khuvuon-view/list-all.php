<!-- <?php print_r($data) ?>  -->
       <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
                      <thead>
                        <tr>
                          <th>Mã khu vườn</th>
                          <th>Tên khu vườn</th>
                          <th>Địa chỉ chi tiết</th>
                          <th>Thuộc Huyện</th>
                          <th>Thuộc Tỉnh</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $khuvuonList = json_decode($data['myList'],true); ?>
                        <?php foreach ($khuvuonList as $khuvuon): ?>
                          <tr class="odd gradeX">
                            <td><?= $khuvuon['Ma_khuvuon'] ?></td>
                            <td><?= $khuvuon['Ten_khuvuon'] ?></td>
                            <td><?= $khuvuon['Diachi'] ?></td>
                            <td><?= $khuvuon['Ten_huyen'] ?></td>
                            <td><?= $khuvuon['Ten_tinh'] ?></td>
                            <td><a href="collect/show/<?= $khuvuon['Ma_khuvuon'] ?>">detail</a>||<a href="admin/edit/khuvuon/<?= $khuvuon['Ma_khuvuon'] ?>">Edit</a> || <a href="admin/del/khuvuon/<?= $khuvuon['Ma_khuvuon'] ?>">Delete</a></td>
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
