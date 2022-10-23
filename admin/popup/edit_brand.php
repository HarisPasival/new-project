<div class="modal fade" id="edit_brandModal<?= $row['brand_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลยี่ห้อฝาสูบ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="crud.php" method="POST" class="row g-3">
                    <input type="hidden" name="brand_id" value="<?= $row['brand_id']; ?>">
                    <div class="col-12">
                        <label>ชื่อยี่ห้อฝาสูบ:</label>
                        <input type="text" name="brand_name" class="form-control" value="<?= $row['brand_name']; ?>" />
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="edit_brand" class="btn btn-outline-warning"><i class="fa-solid fa-circle-plus"></i> แก้ไขข้อมูล</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>