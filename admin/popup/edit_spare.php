<div class="modal fade" id="edit_spareModal<?= $row['spare_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลอะไหล่</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="crud.php" method="POST" class="row g-3">
                    <input type="hidden" name="spare_id" value="<?= $row['spare_id']; ?>">
                    <div class="col-md-6 mb-3">
                        <label>ชื่ออะไหล่:</label>
                        <input type="text" name="spare_name" value="<?= $row['spare_name']; ?>" class="form-control" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>รุ่นฝาสูบ</label>
                        <input type="text" name="model_name" value="<?= $row['model_name']; ?>" class="form-control" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>จำนวน:</label>
                        <input type="number" name="spare_quanlity" min="1" value="<?= $row['spare_quanlity']; ?>" class="form-control" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>ราคา:</label>
                        <input type="text" name="spare_price" value="<?= $row['spare_price']; ?>" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="update_spare" class="btn btn-outline-warning"><i class="fa-solid fa-circle-plus"></i> แก้ไขข้อมูล</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="fa-solid fa-caret-left"></i> ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>