<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<form id="editForm">
    <!-- Dropdown untuk menampilkan data yang akan diedit -->
    <select id="pekerjaan_dropdown">
        <!-- Opsi dropdown akan dimuatkan melalui JavaScript -->
    </select>
    <select id="agama_dropdown">
        <!-- Opsi dropdown akan dimuatkan melalui JavaScript -->
    </select>
    <select id="pendidikan_dropdown">
        <!-- Opsi dropdown akan dimuatkan melalui JavaScript -->
    </select>
    <br><br>
    <!-- Tombol untuk memuat data dari database -->
    <button type="button" id="editButton">Edit</button>
    <!-- Tombol untuk menyimpan perubahan -->
    <button type="button" id="saveButton">Simpan</button>
</form>

<script>
    // Fungsi untuk memuat data dari database berdasarkan ID
function fetchDataFromDatabaseById(itemId) {
    $.ajax({
        url: 'fetch_data.php', // Ubah dengan URL skrip PHP untuk mengambil data dari database
        method: 'GET',
        data: { id: itemId },
        success: function(data) {
            // Setelah mendapatkan data dari database, panggil fungsi untuk mengambil data dari API
            fetchDataFromAPI(data[0], 'pekerjaan');
            fetchDataFromAPI(data[0], 'agama');
            fetchDataFromAPI(data[0], 'pendidikan');
        },
        error: function(err) {
            console.error('Error fetching data from database: ' + err);
        }
    });
}

// Fungsi untuk memuat data dari API berdasarkan jenis data
function fetchDataFromAPI(databaseItem, dataType) {
    var apiUrl;

    // Tentukan URL API berdasarkan jenis data
    switch (dataType) {
        case 'pekerjaan':
            apiUrl = 'https://masterdata.ppdb.dev19.my.id/api/m_pekerjaan.php';
            break;
        case 'pendidikan':
            apiUrl = 'https://masterdata.ppdb.dev19.my.id/api/m_pendidikan.php';
            break;
        case 'agama':
            apiUrl = 'https://masterdata.ppdb.dev19.my.id/api/m_agama.php';
            break;
        default:
            console.error('Unknown data type: ' + dataType);
            return;
    }

    $.ajax({
        url: apiUrl,
        method: 'GET',
        success: function(apiData) {
            // Setelah mendapatkan data dari API, sinkronkan data dan tampilkan dalam dropdown
            synchronizeDataAndDisplayDropdown(apiData, databaseItem, dataType);
        },
        error: function(err) {
            console.error('Error fetching data from API: ' + err);
        }
    });
}

// Fungsi untuk menyinkronkan data dan menampilkan dalam dropdown
function synchronizeDataAndDisplayDropdown(apiData, databaseItem, dataType) {
    var dropdown = $('#' + dataType + '_dropdown');
    dropdown.empty();

    // Loop melalui data dari API
    if(dataType == "agama")
    {
        $.each(apiData, function(index, item) {
            var option = $('<option></option>').text(item.nama_agama).val(item.nama_agama);
            // Periksa apakah nilai dari API cocok dengan nilai dari database
            if (item.nama_agama == databaseItem[dataType]) {
                option.prop('selected', true);
            }

            dropdown.append(option);
        });
    }else{
        $.each(apiData, function(index, item) {
            var option = $('<option></option>').text(item[dataType]).val(item[dataType]);
            // Periksa apakah nilai dari API cocok dengan nilai dari database
            if (item[dataType] == databaseItem[dataType]) {
                option.prop('selected', true);
            }

            dropdown.append(option);
        });
    }

}

fetchDataFromDatabaseById(1);

</script>

</body>
</html>
