<?php include('../inc/top.php'); ?>

<div class="container">
    <h2>Danh sách học viên của lớp: <?php echo $lop_hoc['tenlop']; ?></h2>
    <table class="table"style="background-color: #e6e6fa; padding: 20px;" >
        <thead>
            <tr>
                <th>Số thứ tự</th>
                <th>Học viên ID</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $count = 1;
            foreach ($hoc_viens as $hoc_vien) : ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $hoc_vien['hoten']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include('../inc/bottom.php'); ?>
