<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
  <style>
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
      display: flex;
      align-items: center;
      justify-content: center;
      background-size: 100% 100%;
      width: 85%;
      height: 150px;
      margin: 8px 0;
      cursor: pointer;
      margin-left: 7.5%;
      color: white;
      padding: 0;
      border: none;
    }

    .servicesContainer button.putty {
      background-image: url(putty.jpg);
    }

    .servicesContainer button.ssh {
      background-image: url(ssh.jpg);
    }

  /*.servicesContainer button {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(0, 0, 0, 0.3);
    width: 85%;
    height: 70px;
    border-radius: 5px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
    margin-left: 7.5%;
    color: white;
    padding: 0;
    border: 0.5px white solid;
  }

  .servicesContainer button .left {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    height: 100%;
  }

  .servicesContainer button .left img {
    width: 50px;
    height: 50px;
    padding: 0;
    opacity: 1;
    object-fit: fill;
  }

  .servicesContainer button .middle {
    display: inline-flex;
    align-items: center;
      text-align: left;
    width: calc(100% - 140px);
    height: 100%;
  }

  .servicesContainer button .right {
    display: inline-flex;
    align-items: center;
      text-align: left;
    width: 70px;
    height: 100%;
    font-size: 20px;
  }*/
  </style>
</head>
<body>
    <span class="close" onclick="hideServices()">&times;</span>
    <img src="liveiLogo.png">
    <h2>Services Menu</h2>

    <button onclick="location.href='589065d67d5a557898f4183950ec58cf.php'" class="putty"></button>
    <button onclick="location.href='bdd33ab49ef4aefdc55cfbee2898b672.php'" class="ssh"></button>

  <!-- <button onclick="location.href='589065d67d5a557898f4183950ec58cf.php'">
      <div class="left">
        <img src="putty.png">
      </div>
      <div class="middle">
        <label>Putty Training for 2 Hours</label>
      </div>
      <div class="right">
        <label>$10/hr</label>
      </div>
    </button>

    <button onclick="">
      <div class="left">
        <img src="ssh.png">
      </div>
      <div class="middle">
        <label>SSH Tutorial for 1 Hour</label>
      </div>
      <div class="right">
        <label>$5/hr</label>
      </div>
    </button> -->
<!-- 
    <button onclick="">
      <div class="left">
        <img src="ubiquiti.png" muted autoplay playsinline></img>
      </div>
      <div class="middle">
        <label>UniFi Training for 4 Hours</label>
      </div>
      <div class="right">
        <label>$15/hr</label>
      </div>
    </button>
 -->
</body>
</html>