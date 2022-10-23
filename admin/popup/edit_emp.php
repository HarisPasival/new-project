    <!-- Modal update customer-->
    <div class="modal fade" id="edit_employeeModal<?= $row['employee_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลลูกค้า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <form action="crud.php" method="POST" class="row g-3">
                            <input type="hidden" name="employee_id" value="<?= $row['employee_id'] ?>">
                            <div class="col-md-6">
                                <label class="form-label">ชื่อ :</label>
                                <input type="text" name="name_emp" value="<?= $row['name_emp'] ?>" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">นามสกุล :</label>
                                <input type="text" name="surname_emp" value="<?= $row['surname_emp'] ?>" class="form-control" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">ชื่อผู้ใช้ :</label>
                                <input type="text" name="username_emp" value="<?= $row['username_emp'] ?>" class="form-control" readonly />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ตำแหน่ง :</label>
                                <select name="u_role" class="form-select">
                                    <option selected>เลือกสิทธิ์</option>
                                    <option value="1" <?php if ($row['u_role'] == '1') { ?> selected="selected" <?php } ?>>แอดมิน</option>
                                    <option value="2" <?php if ($row['u_role'] == '2') { ?> selected="selected" <?php } ?>>ช่างซ่อม</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">เบอร์โทรศัพท์:</label>
                                <input type="text" name="phone_emp" value="<?= $row['phone_emp'] ?>" maxlength="10" class="form-control" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">อีเมล:</label>
                                <input type="email" name="email_emp" value="<?= $row['email_emp'] ?>" class="form-control" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">ที่อยู่:</label>
                                <input type="text" name="address_emp" value="<?= $row['address_emp'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_emp" class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> แก้ไขข้อมูล</button>
                                <a href="employee.php" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-caret-left"></i> ย้อนกลับ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>