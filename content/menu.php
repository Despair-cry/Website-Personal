<?php
 if ($_GET['site']=="a") {
    include"page/Permohonan-kelas.php";
  }
  elseif($_GET['site']=="Data_Kelas") {
    include"page/Data_Kelas.php";
  }
  elseif($_GET['site']=="Data_Karyawan") {
    include"page/Data_Karyawan.php";
  }
  elseif($_GET['site']=="Permohonan") {
    include"page/Permohonan-kelas.php";
  }
  elseif($_GET['site']=="Permohonan-Approved") {
    include"page/Data_Approved.php";
  }
  elseif($_GET['site']=="Approve") {
    include"page/Approve.php";
  }
  elseif($_GET['site']=="Edit_Kelas") {
    include"page/Edit_Kelas.php";
  }
  elseif($_GET['site']=="Edit_Karyawan") {
    include"page/Edit_Karyawan.php";
  }
  elseif($_GET['site']=="delete_kelas") {
    include"page/Delete_kelas.php";
  }
  elseif($_GET['site']=="delete_karyawan") {
    include"page/Delete_karyawan.php";
  }
  elseif($_GET['site']=="F_Status_Kelas_Aktif") {
    include"page/F_Status_Kelas_Aktifkan.php";
  }
  elseif($_GET['site']=="F_Status_Kelas_Nonaktif") {
    include"page/F_Status_Kelas_Nonaktif.php";
  }
  elseif($_GET['site']=="Batal_Permohonan") {
    include"page/Batal_Permohonan.php";
  }
   elseif($_GET['site']=="finish") {
    include"page/Finish.php";
  }
   elseif($_GET['site']=="Cancel") {
    include"page/Cancel.php";
  } 
  elseif($_GET['site']=="reset") {
    include"page/reset_password.php";
  } 
  elseif($_GET['site']=="Detail_Permintaan") {
    include"page/Detail_Permohonan.php";
  } 

  elseif($_GET['site']=="report") {
    include"page/report.php";
  }
  
  elseif($_GET['site']=="logout") {
    include"logout.php";
  }




?>