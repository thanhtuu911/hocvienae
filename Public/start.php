<?php
include("inc/top.php");
?>
<style>
    .row.text-center {
    margin-top: 100px;
}

</style>

<?php
foreach ($danhmuc as $d) {
    $i = 0;
?>
    <div class="row text-center">
        <h3 class="mt-2"><a class="text-decoration-none text-danger"  href="index.php?action=group&id=<?php echo $d["id"]; ?>">
                <?php echo $d["tendanhmuc"]; ?></a></h3>
    </div>

    <div class="container mt-2">

        <div class="row mt-2 ">
            <?php foreach ($khoahoc as $mh) {
                if ($mh["danhmuc_id"] == $d["id"] && $i < 4) {
                    $i++;
            ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="../<?php echo $mh['hinhanh']; ?>" class="card-img-top" alt="<?php echo $mh['tenkhoahoc']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $mh['tenkhoahoc']; ?></h5>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="index.php?action=detail&id=<?php echo $mh['id']; ?>" class="btn btn-sm btn-outline-danger">Xem chi tiết</a>
                                    </div>
                                    <!-- <small class="text-muted"><?php echo number_format($mh['phi']); ?> VNĐ</small>  -->
                                    <span <?php echo $mh['id']; ?>><i class="fas fa-heart fa-beat" style="color: red;" <?php echo $mh['id']; ?>>&nbsp;</i> <?php echo $mh['luotthich']; ?></span>

                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            }

            ?>
        </div>

    </div>

<?php
}

?>

<?php
include("inc/bottom.php");
?>