document.addEventListener('DOMContentLoaded', function() {
    var deleteButtons = document.getElementsByClassName('delProduct');
    for (var i = 0; i < deleteButtons.length; i++) {
        deleteButtons[i].addEventListener('click', function() {
            var productId = this.getAttribute('data-id');
            console.log(productId);
            deleteProduct(productId);
        });
    }
    
    function deleteProduct(productId) {
        // Sử dụng AJAX hoặc Fetch API để gửi yêu cầu xóa sản phẩm tới controller
        // Ví dụ sử dụng AJAX với thư viện jQuery:
        $.ajax({
            url: 'ajax/delProduct/' + productId,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Xử lý thành công
                    console.log(response.message);
                    location.reload();
                } else {
                    console.log(response.message);
                }
                // Xử lý thành công
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi
            }
        });
    }
});