
<form action="" method="GET">
    <input type="hidden" name="controller" value="category" />
    <input type="hidden" name="action" value="index" />
    <div class="form-group">
<!--    Thẻ label dùng để kết hợp với input để tạo ra hiệu ứng
    click vào label -> trỏ chuột input
    -->
        <label for="name">Tìm kiếm</label>
        <input type="text" id="name" name="name"
value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>"
               class="form-control" />
    </div>
    <div class="form-group">
        <?php
        $selected_disabled = '';
        $selected_active = '';
        if (isset($_GET['status'])) {
            switch ($_GET['status']) {
                case 0: $selected_disabled = 'selected';break;
                case 1: $selected_active = 'selected';break;
            }
        }
        ?>
        <label for="status">Chọn trạng thái</label>
        <select id="status" name="status" class="form-control">
            <option value="0" <?php echo $selected_disabled?> >
                Disabled
            </option>
            <option value="1" <?php echo $selected_active?> >
                Active
            </option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Search"
               class="btn btn-success" />
        <a class="btn btn-default"
           href="index.php?controller=category&action=index">
            Xóa filter
        </a>
    </div>
</form>

<h1 style="text-align: center; font-family: Franchise; color: #8ad919;">Danh sách Category</h1>
<a href="index.php?controller=category&action=create" class="btn btn-success">
    Thêm mới
</a>
<table class="table table-bordered" style="padding: 15px;
        border: 5px solid green;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
  <?php if (!empty($categories)): ?>
    <?php foreach ($categories as $category): ?>
          <tr>
              <td>
                <?php echo $category['id']; ?>
              </td>
              <td>
                <?php echo $category['name']; ?>
              </td>
              <td>
                <?php if (!empty($category['avatar'])): ?>
                    <img src="assets/uploads/<?php echo $category['avatar'] ?>" width="60"/>
                <?php endif; ?>
              </td>
              <td>
                <?php echo $category['description']; ?>
              </td>
              <td>
                <?php
                $status_text = 'Active';
                if ($category['status'] == 0) {
                  $status_text = 'Disabled';
                }
                echo $status_text;
                ?>
              </td>
              <td>
                <?php echo date('d-m-Y H:i:s', strtotime($category['created_at'])); ?>
              </td>
              <td>
                <?php
                if (!empty($category['updated_at'])) {
                  echo date('d-m-Y H:i:s', strtotime($category['updated_at']));
                }
                ?>
              </td>
              <td>
                  <a href="index.php?controller=category&action=detail&id=<?php echo $category['id'] ?>"
                      class="btn btn-success">
                      Chi tiết
                  </a>
                  <a href="index.php?controller=category&action=update&id=<?php echo $category['id'] ?>" class="btn btn-success">
                     Sửa
                  </a>
                  <a href="index.php?controller=category&action=delete&id=<?php echo $category['id'] ?>"
                     onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')" class="btn btn-success">
                      Xóa
                  </a>
              </td>
          </tr>
    <?php endforeach ?>
  <?php else: ?>
      <tr>
          <td colspan="7">Không có bản ghi nào</td>
      </tr>
  <?php endif; ?>
</table>

<!--  hiển thị phân trang-->
<?php echo $pagination; ?>

