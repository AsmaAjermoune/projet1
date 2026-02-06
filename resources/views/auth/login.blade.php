<form action="/login" method='POST'>
 @csrf
  <div>
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password" id="pwd" required>
    </div>
    <button type="submit">se connecter</button>
</form>