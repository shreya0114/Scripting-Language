<?php
$info = [
    'name' => 'Ram Bahadur',
    'address' => 'Lalitpur',
    'email' => 'info@ram.com',
    'phone' => 98454545,
    'website' => 'www.ram.com'
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Info Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        td, th {
            border: 1px solid #000;
            padding: 8px;
        }
        th {
            text-align: left;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <?php foreach ($info as $key => $value): ?>
            <tr>
                <th><?php echo ucfirst($key); ?></th>
                <td><?php echo $value; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>