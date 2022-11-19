<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
        <title>LAPORAN REKAP JOB ORDER</title>

    <style>
        body {
            font-family: sans-serif;
            /*font-family: courier;*/
            /*font-weight: bold;*/
        }
        .header {
            text-align: center;
        },
        .header, h1 {
            font-size: 11pt;
            margin-bottom: 0px;
        }

        .header, p {
            font-size: 10pt;
            margin-top: 0px;
        }
        .table_content {
            color: #232323;
            border-collapse: collapse;
            font-size: 8pt;
            margin-top: 15px;
        }

        .table_content, .border {
            border: 1px solid black;
            padding: 4px;
        }
        .table_content, thead, th {
            text-transform: uppercase;
            padding: 7px;
            text-align: center;

        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        ul li {
            display:inline;
            list-style-type:none;
        }

        table.grid1 {
          font-family: sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        table.grid1 td, table.grid1 th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 5px;
        }

        table.grid1 tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>
</head>
<body>

<div class="header">
    <table class="grid1" style="margin-bottom: 25px; width: 100%; font-size: 9px">
        <thead>
        <tr style="background-color: #e6f2ff">
            <th>No</th>
            <th>No. Job Order</th>
            <th>Type JO</th>
            <th>Tanggal</th>
            <th>Customer</th>
            <th>Biaya Estimasi</th>
            <th>CBO</th>
            <th>CBI</th>
            <th>Non Kasbon</th>
            <th>Penyelesaian</th>
        </tr>
        </thead>
        
        <tbody>
            <?php foreach ($data as $key => $row) : ?>
                <tr class="border">
                    <td class="border"><?php echo $key+1 ?></td>
                    <td class="border" align="left"><?php echo $row->no_joborder ?></td>
                    <td class="border" align="left"><?php echo $row->type ?></td>
                    <td class="border" align="left"><?php echo $row->tanggal_jo ?></td>
                    <td class="border" align="left"><?php echo $row->customer1->nama_customer ?></td>
                    <td class="border" align="left"><?php echo $row->biaya_estimasi ?></td>
                    <td class="border" align="left"><?php echo $row->total_kasbon_cbo ?></td>
                    <td class="border" align="left"><?php echo $row->total_kasbon_cbi ?></td>
                    <td class="border" align="left"><?php echo $row->total_non_kasbon ?></td>
                    <td class="border" align="left"><?php echo $row->biaya_actual ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>