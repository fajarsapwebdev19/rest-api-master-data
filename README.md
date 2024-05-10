# Pengenalan
REST API Master Data Untuk Aplikasi Di Lingkungan Sekolah Seperti Kegiatan PPDB, Pendataan Siswa dan masih banyak lagi. 

## Cara Menggunakan

Cara Menggunakannya silahkan masukan link berikut ke dalam aplikasi yang di implementasikan pada table berikut :

| DATA | METHOD | URL |
| :--- | :--- | :--- |
| `Agama` | `GET` | https://masterdata.ppdb.dev19.my.id/api/m_agama.php |
| `Alasan PIP (Program Indonesia Pintar)` | `GET` | https://masterdata.ppdb.dev19.my.id/api/m_cita_cita.php |
| `Cita-Cita` | `GET` | https://masterdata.ppdb.dev19.my.id/api/m_agama.php |
| `Hobby` | `GET` | https://masterdata.ppdb.dev19.my.id/api/m_hobbi.php |
| `Jenis Pendaftaran` | `GET` | https://masterdata.ppdb.dev19.my.id/api/m_jenis_pendaftaran.php |
| `Kejuruan` | `GET` | https://masterdata.ppdb.dev19.my.id/api/m_kejuruan.php |
| `Pekerjaan` | `GET` | https://masterdata.ppdb.dev19.my.id/api/m_pekerjaan.php |
| `Pendidikan` | `GET` | https://masterdata.ppdb.dev19.my.id/api/m_pendidikan.php |
| `Penghasilan` | `GET` | https://masterdata.ppdb.dev19.my.id/api/m_penghasilan.php |
| `Tempat Tinggal` | `GET` | https://masterdata.ppdb.dev19.my.id/api/m_tempat_tinggal.php |
| `Transportasi` | `GET` | https://masterdata.ppdb.dev19.my.id/api/m_transportasi.php |

Silahkan clone repo ini jika anda ingin melakukan test untuk menggunakan api.

```
git clone https://github.com/fajarsapwebdev19/rest-api-master-data.git
```

jangan lupa buat database dengan nama test_api dan import databasenya rest-api-master.sql pada php my admin atau jalankan langsung di mysql workbench / visual studio code

atau jika ingin menggunakan nama database yang berbeda bisa melakukan configurasi berikut

```
<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = ''; //silahkan beri nama sesuai yang anda buat di php my admin

$con = mysqli_connect($server, $username, $password, $database);
```

Atau liat langsung codenya di file index.php

## Status Codes

REST API Master Data Status Code :

| Status Code | Description |
| :--- | :--- |
| 200 | `OK` |
| 404 | `NOT FOUND` |
| 500 | `INTERNAL SERVER ERROR` |

