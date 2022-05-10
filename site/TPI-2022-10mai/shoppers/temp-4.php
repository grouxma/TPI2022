
<table style="width:100%">
    <tr>
        <th>nom</th>
        <th>largeur</th>
        <th>longueur</th>
    </tr>
        <?php
        //Call class
        $db = new DBAccess();

        //Research all fields information
        $allFields = $db->getAllFields();

        //Display all fields values
        foreach ($allFields as $field)

            echo"
    <tr>
        <td>$field[name]</td>
        <td>$field[width]</td>
        <td>$field[length]</td>
        <td>$field[id]</td>
        
    </tr>
    ";
        ?>
</table>