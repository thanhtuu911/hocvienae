document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input');
    const searchSuggestions = document.getElementById('search-suggestions');

    searchInput.addEventListener('input', function (e) {
        const keyword = e.target.value.trim(); // Lấy từ khoá và loại bỏ khoảng trắng thừa

        // Kiểm tra nếu từ khoá không rỗng
        if (keyword !== '') {
            fetchSuggestions(keyword);
        } else {
            searchSuggestions.innerHTML = ''; // Nếu từ khoá rỗng, xóa gợi ý
        }
    });

    function fetchSuggestions(keyword) {
        // Gửi yêu cầu đến server để lấy gợi ý
        fetch(`timkiem.php?keyword=${keyword}`)
            .then(response => response.text())
            .then(data => {
                // Hiển thị danh sách gợi ý trong #search-suggestions
                searchSuggestions.innerHTML = data;
            })
            .catch(error => {
                console.error('Fetch Error:', error);
            });
    }
});
