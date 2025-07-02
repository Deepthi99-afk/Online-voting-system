<?php
include 'db.php';
$candidates = $conn->query("SELECT * FROM candidates");
while($row = $candidates->fetch_assoc()) {
?>
<div class="form-check">
  <input class="form-check-input" type="radio" name="candidate_id" id="candidate<?= $row['id'] ?>" value="<?= $row['id'] ?>" required>
  <label class="form-check-label" for="candidate<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></label>
</div>
<?php } ?>