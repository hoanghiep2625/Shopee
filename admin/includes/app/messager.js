<script>
success: function(response) {
    if (response === "success") {
        $("input[name='message']").val(""); // Xóa nội dung tin nhắn trong ô input sau khi gửi thành công
        var mayeucau = "giatri-mayeucau"; // Thay "giatri-mayeucau" bằng giá trị mayeucau bạn muốn truyền vào URL

        // Tải tin nhắn mới từ server và thêm vào container
        $.ajax({
            url: "messager.php?mayeucau=" + mayeucau, // Đường dẫn tới tệp tin "save_message.php" với tham số mayeucau trong URL
            type: "GET",
            success: function(newMessage) {
                $("#message-container").prepend(newMessage); // Thêm tin nhắn mới vào đầu danh sách tin nhắn
                $("#message-container").scrollTop($("#message-container")[0].scrollHeight); // Cuộn xuống tin nhắn mới
            }
        });
    } else {
        alert("Gửi tin nhắn thất bại.");
    }
}

</script>