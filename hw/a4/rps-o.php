<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>yooso's RockPaperScissors</title>
    <link rel="stylesheet" href="a4-style.css">
    <script type="text/Javascript" src="rps.js"></script>
  </head>
  <body>
    <div class="menu">
      <?php include 'nav.php';?>
    </div>

    <div>
      <center>
      <img src="images/rps_title.png" width="40%" />
      <br />
      <table>
        <tr>
          <td>
            <img src="http://i.imgur.com/lTtk79W.png" /></td>
          <td colspan="3"></td>
          <td>
            <img src="http://i.imgur.com/NA0ZXLB.png" /></td>
        </tr>
        <tr>
          <td id="side"><img id="img" src="" /></td>
          <td colspan="3" id="winner">Go for it!</td>
          <td id="side"><img id="img2" src="" /></td>
        </tr>
      </table>
      <br><br><hr>
      <table id="buttons">
        <tr>
          <td>
            <input type="button" class="myButton" value="Rock" onclick="pic1()" /><br>
            <input type="button" class="myButton" value="Paper" onclick="pic2()" /><br>
            <input type="button" class="myButton" value="Scissors" onclick="pic3()" /></td>
          <td id="sc1">0</td>
          <td><p>|</p></td>
          <td id="sc2">0</td>
          <td><p>COMPUTER</p></td>
        </tr>
      </table>
      </center>
      <div class="push"></div>
    </div>
    <div class="footer">
      <center>
      <p id="copy" style="font-size:10px; text-align: center">Copyright &copy; 2015 Soo-Min Yoo</p>
      </center>
    </div>
  </body>
</html>
