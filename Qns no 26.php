<?php

$students = [
    ["Rajesh", 25, 56, 89, 57, 64, 98],
    ["Hari",   5,  56, 89, 57, 64, 98],
    ["Shyam",  6,  54, 79, 57, 69, 98],
    ["Rita",   10, 16, 89, 56, 64, 98],
    ["Gita",   4,  56, 89, 57, 69, 98],
    ["Sita",   24, 56, 99, 57, 24, 98],
    ["Sita",   24, 56, 99, 57, 24, 98],
    ["Sita",   24, 56, 99, 57, 24, 98],
];

function getResult($marks) {
    $total = array_sum(array_slice($marks, 2)); 
    $result = ($marks[5] < 40) ? "fail" : "pass"; 
    return [$total, $result];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Mark Sheet</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin-bottom: 30px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .pass { background-color: lightgreen; }
        .fail { background-color: red; color: white; }
        .alt1 { background-color: #f2f2f2; }
        .alt2 { background-color: #d9d9d9; }
    </style>
</head>
<body>
<h2>Mark Ledger</h2>
<table>
    <tr>
        <th>SN</th>
        <th>Name</th>
        <th>Roll</th>
        <th>Web Tech II</th>
        <th>DBMS</th>
        <th>Economics</th>
        <th>DSA</th>
        <th>Account</th>
        <th>Total</th>
        <th>Result</th>
    </tr>
    <?php
    $sn = 1;
    foreach ($students as $stu) {
        list($total, $result) = getResult($stu);
        $class = ($result == "pass") ? "pass" : "fail";
        echo "<tr class='$class'>";
        echo "<td>$sn</td>";
        echo "<td>{$stu[0]}</td>";
        echo "<td>{$stu[1]}</td>"; echo "<td>{$stu[2]}</td>";
        echo "<td>{$stu[3]}</td>";
        echo "<td>{$stu[4]}</td>";
        echo "<td>{$stu[5]}</td>";
        echo "<td>{$stu[6]}</td>";
        echo "<td>$total</td>";
        echo "<td class='$class'>$result</td>";
        echo "</tr>";
        $sn++;
    }
    ?>
</table>

<h2>Alternate color</h2>
<table>
<tr>
        <th>SN</th>
        <th>Name</th>
        <th>Roll</th>
        <th>Web Tech II</th>
        <th>DBMS</th>
        <th>Economics</th>
        <th>DSA</th>
        <th>Account</th>
        <th>Total</th>
        <th>Result</th>
    </tr>
    <?php
    $sn = 1;
    foreach ($students as $index => $stu) {
        list($total, $result) = getResult($stu);
        $rowClass = ($index % 2 == 0) ? "alt1" : "alt2"; 
        $resultClass = ($result == "pass") ? "pass" : "fail";

  echo "<tr class='$rowClass'>";
        echo "<td>$sn</td>";
        echo "<td>{$stu[0]}</td>";
        echo "<td>{$stu[1]}</td>";
        echo "<td>{$stu[2]}</td>";
        echo "<td>{$stu[3]}</td>";
        echo "<td>{$stu[4]}</td>";
        echo "<td>{$stu[5]}</td>";
        echo "<td>{$stu[6]}</td>";
        echo "<td>$total</td>";
        echo "<td class='$resultClass'>$result</td>";
        echo "</tr>";
        $sn++;
    }
    ?>
</table>
</body>
</html>        