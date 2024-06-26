<?php include("../inc/top.php"); ?>
<div>
  <h3>Quản lý tài khoản</h3>
  <!-- Thông báo lỗi nếu có -->
  <?php
  if (isset($tb)) {
  ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Lỗi!</strong> <?php echo $tb; ?>
    </div>
  <?php
  }
  ?>
  <div><a class="btn btn-outline-primary" href="index.php?action=them"><span class="glyphicon glyphicon-plus"></span><i class="fa-solid fa-plus fa-xl fa-fade" style="color: #3be8c5;"></i> Thêm tài khoản</a></div>

  <br>

  <!-- Danh sách người dùng -->
  <table class="table table-hover" style="background-color: #e6e6fa; padding: 20px;">
    <tr>
      <th><a href="index.php?sort=email">Email</a></th>
      <th><a href="index.php?sort=sodienthoai">Số điện thoại</a></th>
      <th><a href="index.php?sort=hoten">Họ tên</a></th>
      <th><a href="index.php?sort=loai">Loại quyền</a></th>
      <th>Trạng thái</th>
      <th>Khóa</th>
      <th>Đổi loại quyền</th>
    </tr>
    <?php foreach ($nguoidung as $nd) : ?>
      <tr>
        <td><?php echo $nd["email"]; ?></td>
        <td><?php echo $nd["sodienthoai"]; ?></td>
        <td><?php echo $nd["hoten"]; ?></td>
        <td><?php if ($nd["loai"] == 1) echo "Quản trị";
            elseif ($nd["loai"] == 2) echo "Nhân viên";
            else echo "Khách hàng"; ?></td>
        <td><?php if ($nd["loai"] != 1) {
              if ($nd["trangthai"] == 1) echo "Kích hoạt";
              else echo "Khóa";
            } ?></td>
        <td>
          <?php
          if ($nd["loai"] != 1) {
            if ($nd["trangthai"] == 1) { ?>
              <a class="btn btn-outline-danger" href="?action=khoa&trangthai=0&mand=<?php echo $nd["id"]; ?>">Khóa</a>
        </td>
        <td>
 
        <a href="updateform.php?action=doiloai&id=<?php echo $nd["id"]; ?>" class="btn btn-outline-primary">Đổi loại</a>
      
  </a>

</td>
      </tr>
    <?php
            } else { ?>
      <a class="btn btn-outline-info" href="?action=khoa&trangthai=1&mand=<?php echo $nd["id"]; ?>">Kích hoạt</a></td>
      </tr>
<?php
            }
          }
        endforeach; ?>
  </table>
</div>
<style>
  table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
    font-size: 14px;
  }

  th,
  td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #f5f5f5;
  }
</style>
<?php include("../inc/bottom.php"); ?>