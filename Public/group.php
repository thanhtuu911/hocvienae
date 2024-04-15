<?php include("inc/top.php"); ?>
<div class="container" style="margin-top: 100px;">
    <h1>Danh mục: <?php echo $tendm; ?></h1>
    <div class="row mt-3">
        <?php foreach ($khoahoc as $mh): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="../<?php echo $mh['hinhanh']; ?>" class="card-img-top" alt="<?php echo $mh['tenkhoahoc']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $mh['tenkhoahoc']; ?></h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="index.php?action=detail&id=<?php echo $mh['id']; ?>" class="btn btn-sm btn-outline-secondary">Xem chi tiết</a>
                            </div>
                            <small class="text-muted"><?php echo $mh['phi']; ?></small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include("inc/bottom.php"); ?>
