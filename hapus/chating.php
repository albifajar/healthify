<?php
session_start(); // Memulai sesi
include '../config.php';
// Cek apakah sudah ada sesi dokter
if (isset($_SESSION['doctor'])) {
  $doctor = $_SESSION['doctor'];
} else {
  if (isset($_GET['doctor'])) {
    $doctorId = $_GET['doctor'];
    $pasien = 5114;
    $id_dokter = intval($doctorId);

    // Ambil nama dokter berdasarkan ID dari database
    $query = "SELECT nama_dokter FROM dokter WHERE id_dokter = $id_dokter";
    $result = mysqli_query($koneksi, $query);


    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $doctor = $row['nama_dokter'];

      // Tambahkan record ke tabel room
      $insertQuery = "INSERT INTO room (id_dokter, id_pasien, status_room) VALUES ($id_dokter, $pasien, 'aktif')";
      $insertResult = mysqli_query($koneksi, $insertQuery);

      if ($insertResult) {
        // Simpan nama dokter ke dalam sesi
        $_SESSION['doctor'] = $doctor;
      } else {
        echo "Gagal membuat chat room. Pesan kesalahan: " . mysqli_error($koneksi);
      }
    } else {
      $doctor = "Dokter Tidak Ditemukan";
    }
  }
}

if (isset($_POST['endChat'])) {
  $doctorId = $_GET['doctor'];
  $pasien = 5114;
  $id_dokter = intval($doctorId);
  unset($_SESSION['doctor']);

  // Mulai transaksi
  mysqli_begin_transaction($koneksi, false);
  $error = false;

  try {
    
    $updateQuery = "UPDATE room SET status_room = 'tutup' WHERE id_dokter = $id_dokter";
    $updateResult = mysqli_query($koneksi, $updateQuery);

    if (!$updateResult) {
      throw new Exception("Gagal mengakhiri chat. Pesan kesalahan: " . mysqli_error($koneksi));
    }

    
    mysqli_commit($koneksi);
  } catch (Exception $e) {
    mysqli_rollback($koneksi);
    $error = true;
    echo $e->getMessage();
  }

  mysqli_autocommit($koneksi, true);

  if (!$error) {
    echo "Chat telah diakhiri. Status room telah diubah menjadi tutup.";
    header("Location: healthdoc.php");
  }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html lang="en">
  <head>
    <title>Healthify | Chat</title>
    <link href="" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/dokter.css" />
    <link rel="stylesheet" type="text/css" href="css/style_chat1.css" />
  </head>

  <body>
    <div class="boxUtama">
      <div class="boxKiri">
        <!-- Header -->
        <div class="headerKiri">
          <div class="userimg">
            <img src="vendor/img/doc/profile_user.png" class="cover" />
          </div>
          <div class="usericons">
            <a href="healthdoc.php"><li><ion-icon name="arrow-back-outline"></ion-icon></li></a>
            <li><ion-icon name="chatbox-ellipses"></ion-icon></ion-icon></li>
            <li><ion-icon name="ellipsis-vertical"></ion-icon></li>
          </div>
        </div>
        <!-- Search -->
        <div class="search">
          <div>
            <input type="text" placeholder="Search" />
            <ion-icon name="search-outline"></ion-icon>
          </div>
        </div>
        <!-- Chat List -->
        <div class="chatList">
          <div class="block active">
            <div class="blockimg">
            <?php
                echo '<img src="vendor/img/doc/' . strtolower(str_replace('.', '', $doctor)) . '.jpg" class="cover" />';
              ?>
            </div>
            <div class="details">
              <div class="head">
                <?php
                  echo '<h4 class="doctor-name">' . $doctor . '</h4>';
                ?>
                <h4 class="doctor-name"></span></h4>
                <p class="time">
                  <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $waktuSekarang = date("H:i");
                    echo $waktuSekarang;
                  ?>
                </p>
              </div>
              <div class="message_b">
                
              </div>
            </div>
          </div>
          <!-- <div class="block unread">
            <div class="blockimg">
              <img src="vendor/img/doc/dokter_yura.png" class="cover" />
            </div>
            <div class="details">
              <div class="head">
                <h4>dr. Yura Pramesti Sahal</h4>
                <p class="time">20:00</p>
              </div>
              <div class="message_b">
                <p>Lorem ipsum dolor sit amet, sed diam voluptua.</p>
                <b>1</b>
              </div>
            </div>
          </div> -->
          <!-- <div class="block unread">
            <div class="blockimg">
              <img src="vendor/img/doc/profile_dokter 2.png" class="cover" />
            </div>
            <div class="details">
              <div class="head">
                <h4>dr. Lorem Ipsum</h4>
                <p class="time">19:30</p>
              </div>
              <div class="message_b">
                <p>Lorem ipsum dolor sit amet, sed diam voluptua.</p>
                <b>1</b>
              </div>
            </div>
          </div> -->
          <!-- <div class="block">
            <div class="blockimg">
              <img src="vendor/img/doc/profile_dokter 1.png" class="cover" />
            </div>
            <div class="details">
              <div class="head">
                <h4>dr. Lorem Ipsum</h4>
                <p class="time">Yesterday</p>
              </div>
              <div class="message_b">
                <p>Lorem ipsum dolor sit amet, sed diam voluptua.</p>
              </div>
            </div>
          </div> -->
          <form method="post">
            <div class="endChat">
              <div>
                <button type="submit" name="endChat" class="endChat">Akhiri Chat</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="boxKanan">
        <!-- Header -->
        <div class="headerKanan">
          <div class="cusimg">
            <div class="userimg">
            <?php

            // Tampilkan foto dokter sesuai dengan nama dokter yang dipilih
            echo '<img id=doctorImage src="vendor/img/doc/' . strtolower(str_replace('.', '', $doctor)) . '.jpg" class="cover" />';
            ?>
            </div>
            <?php

        // Tampilkan nama dokter yang dipilih
        echo '<h4 class="doctor-header">' . $doctor . '<br /><span>online</span></h4>';
        ?>
          </div>
          <div class="usericons">
            <li><ion-icon name="search"></ion-icon></li>
            <li><ion-icon name="ellipsis-vertical"></ion-icon></li>
          </div>
        </div>
        <!-- Chatbox -->
        <div class="chatBox" id="chatBox">
        <div id="messageContainer"></div>
          <!-- <div class="message mine">
            <p>Hi<br /><span>20:15</span></p>
          </div>
          <div class="message your">
            <p>Hello<br /><span>20:15</span></p>
          </div> -->
        </div>
        <!-- Chat Input -->
        <div class="chatInput">
          <ion-icon name="attach-outline"></ion-icon>
          <input type="text" id="chatInputan" placeholder="Type a message"  />
            <ion-icon id="voiceIcon" name="send" onclick="sendMessage()"></ion-icon>
        </div>
      </div>
    </div>

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <script src="../js/chat1.js"></script>
    <script>
  document.querySelector('form').addEventListener('submit', function() {
    alert('Chat telah ditutup');
  });
</script>
  </body>
</html>
