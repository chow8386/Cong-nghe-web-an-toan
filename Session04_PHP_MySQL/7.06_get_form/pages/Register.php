<div id="center">
  <h2>Form Đăng Ký</h2>
  <form action="index.php?page=infoUser" method="POST">
    <div>
      <div class="row">
        <label>Username:</label>
        <div class="input-group">
          <input class="input-field" type="text" name="username" required>
        </div>
      </div>

      <div class="row">
        <label>Password:</label>
        <div class="input-group">
          <input class="input-field" type="password" name="password" required>
        </div>
      </div>

      <div class="row">
        <label>Gender:</label>
        <div class="input-group">
          <input type="radio" name="gender" value="Male" required> Male <br>
          <input type="radio" name="gender" value="Female" required> Female
        </div>
      </div>

      <div class="row">
        <label>Address:</label>
        <div class="input-group">
          <select name="address" required>  
            <option value="Hà Nội">Hà Nội</option>  
            <option value="TP HCM">TP HCM</option>  
            <option value="Huế">Huế</option>  <br>
            <option value="Đà Nẵng">Đà Nẵng</option>  
          </select> 
        </div>
      </div>

      <div class="row">
        <label>Enable Programming Language:</label>
        <div class="input-group">
          <input type="checkbox" name="language[]" value="PHP"> PHP,     
          <input type="checkbox" name="language[]" value="C#"> C#, 
          <input type="checkbox" name="language[]" value="Java"> Java, 
          <input type="checkbox" name="language[]" value="C++"> C++  
        </div>
      </div>

      <div class="row">
        <label>Skill:</label>
        <div class="input-group">
          <input type="radio" name="skill" value="Normal"> Normal <br>
          <input type="radio" name="skill" value="Good"> Good <br>
          <input type="radio" name="skill" value="Very Good"> Very Good <br>
          <input type="radio" name="skill" value="Excellent"> Excellent
        </div>
      </div>

      <div class="row">
        <label>Note:</label>
        <div class="input-group">
          <textarea class="" name="note" rows="3" cols="40"></textarea>
        </div>
      </div>

      <div class="row">
        <label>Marriage Status:</label>
        <div class="input-group">
          <input type="checkbox" name="marriage-status" value="Yes"> Married
        </div>
      </div>

      <div class="align-center">
        <button type="reset" name="reset-register">Reset</button>
        <button type="submit" name="register">Register</button>
      </div>
    </div>
  </form>
</div>
