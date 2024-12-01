<!DOCTYPE html>
<html>
<head>
    <title>Employee Hierarchy</title>
    <style>
        ul {
            list-style-type: none;
        }
        li {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <h1>Employee Hierarchy</h1>
    <ul>
        <?php
        if (isset($hierarchy[null])) {
            foreach ($hierarchy[null] as $boss) {
                echo "<li>{$boss['FIRST_NAME']} {$boss['LAST_NAME']}</li>";
                if (isset($hierarchy[$boss['ID']])) {
                    echo "<ul>";
                    foreach ($hierarchy[$boss['ID']] as $subordinate) {
                        echo "<li>{$subordinate['FIRST_NAME']} {$subordinate['LAST_NAME']}</li>";
                    }
                    echo "</ul>";
                }
            }
        }
        ?>
    </ul>
</body>
</html>