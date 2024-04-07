</div>
</main>

<footer class="footer">
	<div class="container-fluid">
		<div class="row text-muted">
			<div class="col-6 text-start">
				<p class="mb-0 mx-auto">
					<a class="text-muted" href="#"><strong>American English</strong></a>
				</p>
			</div>
			<div class="col-6 text-end">
				<ul class="list-inline">
					<li class="list-inline-item">
						<a class="text-muted" href="#" id="supportLink">Hỗ trợ</a>
						</a>
					</li>
				</ul>
			</div>
			<div class="modal fade" id="supportModal" tabindex="-1" aria-labelledby="supportModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="supportModalLabel">Thông báo hỗ trợ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="color: red;">
        <!-- Nội dung thông báo hỗ trợ -->
		<img src="../../image/logo/LogoAE1.jpg" alt="" width="90px" style="margin-left: 150px; ">
        <h1>American English</h1>
		<h2>Admin</h2>
        <p>Hãy liên hệ với chúng tôi qua số điện thoại: 0123456789</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
		</div>
	</div>
</footer>
</div>
</div>


<script>
    // Lắng nghe sự kiện click trên liên kết "Hỗ trợ"
    document.getElementById("supportLink").addEventListener("click", function(event) {
        // Ngăn chặn hành vi mặc định của liên kết (chuyển trang)
        event.preventDefault();
        
        // Hiển thị modal
        var myModal = new bootstrap.Modal(document.getElementById('supportModal'));
        myModal.show();
    });
</script>
</body>

</html>