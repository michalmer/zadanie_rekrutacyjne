<?php
?>

<!DOCTYPE html>
<html>

<head>
        <title>Test</title>

</head>

<body>
    <table>
            <tr>
                <th>User ID</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>PHONE NUMBER</th>
                <th>EMAIL</th>
                <th>POSITION</th>
                <th>SUPERVISOR_ID</th>

            </tr>
            <?php
                foreach ($userArray as $user) {
                    echo "<tr>
                        <td>{$user['ID']}</td>
                        <td>{$user['FIRST_NAME']}</td>
                        <td>{$user['LAST_NAME']}</td>
                        <td>{$user['PHONE_NUMBER']}</td>
                        <td>{$user['EMAIL']}</td>
                        <td>";
                    echo isset($positionsMap[$user['POSITION_ID']]) ? $positionsMap[$user['POSITION_ID']] : 'Unknown';
                    echo "</td>
                    <td>{$user['supervisor_name']}</td>
                    </tr>";
                }
            ?>
                
    </table>

</body>

