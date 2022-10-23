    <!-- Modal update customer-->
    <div class="modal fade" id="edit_customerModal<?= $row['customer_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลลูกค้า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <form action="crud.php" method="POST" class="row g-3">
                            <input type="hidden" name="customer_id" value="<?= $row['customer_id'] ?>">
                            <div class="col-md-6">
                                <label class="form-label">ชื่อ :</label>
                                <input type="text" name="name_ct" value="<?= $row['name_ct'] ?>" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">นามสกุล :</label>
                                <input type="text" name="surname_ct" value="<?= $row['surname_ct'] ?>" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ชื่อผู้ใช้ :</label>
                                <input type="text" name="username_ct" value="<?= $row['username_ct'] ?>" class="form-control" readonly />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">เบอร์โทรศัพท์:</label>
                                <input type="text" name="phone_ct" value="<?= $row['phone_ct'] ?>" maxlength="10" class="form-control" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">อีเมล:</label>
                                <input type="email" name="email_ct" value="<?= $row['email_ct'] ?>" class="form-control" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">ที่อยู่:</label>
                                <input type="text" name="address_ct" value="<?= $row['address_ct'] ?>" class="form-control" />
                            </div>
                            <div class="mt-3">
                                <button type="submit" name="update_cus" class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> แก้ไขข้อมูล</button>
                                <a href="customer.php" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-caret-left"></i> ย้อนกลับ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>