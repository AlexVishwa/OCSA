<?php set_time_limit(0); ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<script type="text/javascript">
    var conn = new WebSocket('wss://ocsa.in:2020');
conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    console.log(e.data);
};
conn.send("hello aadmi");
</script>
</body>
</html>