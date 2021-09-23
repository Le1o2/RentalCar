    <form name="qty" method="POST" action="" onsubmit="return isEmpty()">
        <table class="reservelist">
            <th>Picture</th>
            <th>Picture</th>
            <th>Picture</th>
            <th>Picture</th>
            <th>Picture</th>
            <?php
            session_start();
            $reserve = $_SESSION['reserve'];

            if (isset($reserve)) {
                foreach ($reserve as $a) {

                    echo "<tr>";
                    echo "<td><img src=\"CarPic/" . $a['image'] . ".jpeg\" class =\"CarPic\"></td>";
                    echo "<td>" . $a['name'] . "</td>";
                    echo "<td>AU$" . $a['price'] . "</td>";
                    echo "<td><input name=\"" . $a['image'] . "\" value=\"" . $a['days'] . "\"type=\"number\" ,min=\"1\" max=\"99\" onchange=\"changeDays('" . $a['image'] . "',this.form." . $a['image'] . ".value)\"></td>";
                    echo "<td><a href=\"remove.php?id={$a['image']}\">Delete</a></td>";
                    echo "</tr>";
                }
            }
            ?>
            <tr>
            </tr>
        </table>
    </form>