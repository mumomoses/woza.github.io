<?php
include "head.php";
include "menu.php";
?>
<h1>members list</h1>
<table>
    <tr><th>sn</th><th>Name</th><th>Email</th><th>Phone</th><th>Photo</th><th>action</th></tr>
    <?php
    $qry = mysqli_query($conn,"SELECT * FROM members");
    while($row = mysqli_fetch_array($qry));
    {
        ?>
        <tr><td><?php echo $i;?></td><td><?php echo $row["name"];?></td><td><?php echo $row["email"];?></td><td>phone</td><td>photo</td><td>action</td>
        <?php
        $i++;
    }
    ?>
</table>
<?php
include "footer.php";
?>