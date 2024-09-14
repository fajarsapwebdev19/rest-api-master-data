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
        <option value="">Pilih</option>
    </select>
    <select id="agama_dropdown">
        <option value="">Pilih</option>
    </select>
    <select id="pendidikan_dropdown">
        <option value="">Pilih</option>
    </select>
</form>

<script>
    $.ajax({
        url: 'https://masterdata.ppdb.dev19.my.id/api/religion.php',
        method: 'GET',
        success:function(response)
        {
            let data = response.data;
            let select = $('#agama_dropdown');

            $.each(data, function(index,item) {
                select.append('<option name="' + item.religion_name + '">' + item.religion_name + "</option>");
            });
        }
    });

    $.ajax({
        url: 'https://masterdata.ppdb.dev19.my.id/api/work.php',
        method: 'GET',
        success:function(response)
        {
            let data = response.data;
            let select = $('#pekerjaan_dropdown');

            $.each(data, function(index, item){
                select.append('<option name="' + item.work + '">' + item.work + "</option>");
            });
        }
    });

    $.ajax({
        url: 'https://masterdata.ppdb.dev19.my.id/api/education.php',
        method: 'GET',
        success:function(response)
        {
            let data = response.data;
            let select = $('#pendidikan_dropdown');

            $.each(data, function(index, item){
                select.append('<option name="' + item.education + '">' + item.education + "</option>");
            });
        }
    });

    $.ajax({
        url: 'fetch_data.php?id=1',
        method: 'GET',
        success:function(response)
        {
            let data = response[0];

            select_religion(data.agama);
            select_work(data.pekerjaan);
            select_education(data.pendidikan);
        }
    });

    function select_religion(religion)
    {
        $.ajax({
            url: 'https://masterdata.ppdb.dev19.my.id/api/religion.php',
            method: 'GET',
            success:function(response)
            {
                let data = response.data;
                let select = $('#agama_dropdown');

                $.each(data, function(index,item) {
                    if(item.religion_name == religion)
                    {
                        select.append('<option name="' + item.religion_name + '" selected>' + item.religion_name + "</option>");
                    }
                });
            }
        });
    }

    function select_work(work)
    {
        $.ajax({
            url: 'https://masterdata.ppdb.dev19.my.id/api/work.php',
            method: 'GET',
            success:function(response)
            {
                let data = response.data;
                let select = $('#pekerjaan_dropdown');

                $.each(data, function(index, item){
                    if(item.work == work)
                    {
                        select.append('<option name="' + item.work + '" selected>' + item.work + "</option>");
                    }
                });
            }
        });
    }

    function select_education(education)
    {
        $.ajax({
            url: 'https://masterdata.ppdb.dev19.my.id/api/education.php',
            method: 'GET',
            success:function(response)
            {
                let data = response.data;
                let select = $('#pendidikan_dropdown');

                $.each(data, function(index, item){
                    if(item.education == education)
                    {
                        select.append('<option name="' + item.education + '" selected>' + item.education + "</option>");
                    }
                });
            }
        });
    }
</script>

</body>
</html>
