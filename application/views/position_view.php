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
                <th>ID</th>
                <th>POSITION NAME</th>
            </tr>
            <?php
                foreach ($PositionArray as $position) {
                    echo "<tr>
                        <td>{$position['ID']}</td>
                        <td>{$position['name']}</td>
                        <td>";
                    echo "</td>
                    </tr>";
                }
            ?>
                
    </table>

</body>