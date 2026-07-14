<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Redirecting...</title>
</head>
<body>
    <p>Redirecting to branch admin…</p>

    <form id="autoLoginForm" method="POST" action="{{ $loginUrl }}" target="_self">
        <input type="hidden" name="{{ $fieldNames['username'] }}" value="{{ $account }}">
        <input type="hidden" name="{{ $fieldNames['password'] }}" value="{{ $password }}">
    </form>

    <script>
        document.getElementById('autoLoginForm').submit();
    </script>
</body>
</html>