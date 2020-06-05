<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
    :root{
      --login-width: 320px;
      --login-height: 500px;
      --register-width: 320px;
      --register-height: 500px;
    }
    .servicesContainer {
      display: block;
      position: fixed;
      width: var(--login-width);
      height: var(--login-height);
      top: 60px;
      left: calc(100vw / 2 - calc(var(--login-width) / 2));
      background-color: rgba(0, 0, 0, 0.3);
      text-align: center;
      color: white;
      font-family: "Arial Narrow", Arial, sans-serif;
      font-size: 15px;
      font-weight: normal;
      text-decoration: none;
      border-radius: 5px;
      overflow: auto;
    }

    .close {
      position: absolute;
      right: 10px;
      top: 5px;
      width: 20px;
      height: 20px;
      background: transparent;
      border-style: none;
    }
    
    .close {
      color: white;
      float: right;
      font-size: 28px;
      font-weight: ;
    }

    .close:hover, .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
    .servicesContainer img {
      padding-top: 40px;
      width: 100px;
      opacity: 0.7;
    }
    .servicesContainer button {
    background-color: #668d3c;
    color: white;
    padding: 12px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 85%;
    font-size: 15px;
    border-radius: 5px;
  }
  </style>
</head>
<body>
  <div id="servicesContainer" class="servicesContainer">
    <span class="close" onclick="hideServices()">&times;</span>
    <img src="liveiLogo.png">
    <h2>Services Menu</h2>
    <div style="display: flex; background-color: red;">
      <div style="display: inline-flex; background-color: blue;"></div>
      <div style="display: inline-flex; background-color: green;">
        <div></div>
        <div></div>
      </div>
    </div>
    <button class="btnRegister" onclick="location.href=''">Putty</button>
    <button>SSH</button>
    <button>Linux</button>
  </div>
</body>
</html>