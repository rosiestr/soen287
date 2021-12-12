<?php
$xml = new SimpleXMLElement('users.xml',0,TRUE);

echo('<pre>');
var_dump($xml);
echo('</pre>');
?>
<table border="1">
    <thead>
        <tr>
            <th>name</th>
            <th>email</th>
        </tr>
    </thead>
<tbody>
    <?php
    foreach ($xml->user as $user):
    ?>
    <tr>
    <td><?php echo $user->lastName ?></td>
    <td><?php echo $user->useremail ?></td>
    </tr>
    <?php endforeach; ?>

</tbody>


</table>




