<form method="POST" action="/signup">
    @csrf

    <div>
        <label>Nom</label>
        <input type="text" name="name" required>
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password" id="pwd" required>
    </div>

 
    <input type="hidden" name="password_text" id="pwd_text">
    <input type="hidden" name="role" value="user">

    <button type="submit">register</button>
</form>

<script>
    const pwd = document.getElementById('pwd');
    const pwdText = document.getElementById('pwd_text');

    pwd.addEventListener('input', () => {
        pwdText.value = pwd.value;
    });
</script>
