<!-- Modal -->
<div class="modal fade" id="edit_orderModal<?= $row['order_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ปรับสถานะการสั่งซื้อ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="ordersDB.php" method="POST">
                    <input type="hidden" name="order_id" value="<?= $row['order_id'] ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <label>ชื่ออะไหล่:</label>
                            <select name="spare_id" class="form-select">
                                <?php
                                require '../config/connect.php';
                                $stmt = $conn->query("SELECT spare_id,spare_name FROM spare");
                                $stmt->execute();
                                while ($row = $stmt->fetch()) {
                                ?>
                                    <option value="<?= $row['spare_id']; ?>"><?= $row['spare_name']; ?></option>
                                <?php }  ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>จำนวนที่สั่งซื้อ</label>
                            <input type="number" name="order_quanlity" value="<?= $row['order_quanlity'] ?>" min="1" class="form-control">
                        </div>
                        <div class="mb-3 mt-2">
                            <button class="btn btn-outline-warning" name="edit_orders"><i class="fa-solid fa-location-arrow"></i> ปรับสถานะ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>