<html>

<head>
    <title>AJAX</title>
</head>

<body>
    <h1>AJAX-HTTP POST EXAMPLE</h1>

    <form onsubmit="return false">
        <label>姓名:</label>
        <input type="text" name="name" id="name" placeholder="請輸入姓名">
        <label>年齡:</label>
        <input type="text" name="age" id="age" placeholder="請輸入年齡">
        <input type="submit" value="送出資料" onclick="submit_onclick()">
    </form><br>
    <label>回傳的結果:</label>
    <textarea id="showAjaxResponse" readonly></textarea><!-- 顯示程式碼區塊 -->
    <h5>使網頁在沒有重新載入下，動態更新資料</h5>
</body>

<script type="text/javascript">
    function submit_onclick() {
        var name = document.getElementById("name").value; // 取得欄位數值
        var age = document.getElementById("age").value; // 取得欄位數值
        document.getElementById("name").value = ''; // 欄位數值清空
        document.getElementById("age").value = ''; // 欄位數值清空
        ajaxRequestPost(name, age);
        // console.log(name, age);
    }

    function ajaxRequestPost(name, age) {
        xhr = new XMLHttpRequest();
        xhr.open("POST", "{{ url('/api/ajaxRequest') }}"); // 建立請求方法
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //設定資料傳輸格式

        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById("showAjaxResponse").value = sendData; // 動態更新網頁內容
                value = xhr.responseText;
                console.log(200);
            } else if (xhr.status !== 200) {
                alert("請求發生錯誤，錯誤代碼: HTTP" + xhr.status);
            }
        };
        var sendData = "name=" + name + "\r\nage=" + age;
        xhr.send(sendData); // 送出ajax請求
    }
</script>

</html>