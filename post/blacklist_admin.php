<?php
    include_once 'c_head.php';
?>
    <div class='container'>
        <div class='row'>
            <!-- menu -->
            <?php
            include_once 'c_menu.php';
            ?>
            <!-- end menu -->
            
            <div class='col-xs-7 col-sm-4'>
    <form action="#">
        <table>
            <tr>
                <td>
                    Username:
                </td>
                <td>
                    Status:
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="Username" class="form-control">
                </td>
                <td>
                    <select class="form-control">
                        <option >Normal</option>
                        <option >Alert</option>
                        <option >Blacklist</option>
                    </select>
                </td>
                <td>
                    <input type="submit" onclick="alert('ok!')" value="save"  class="btn btn-default">
                </td>
            </tr>
        </table>
    </form>
        </div>
    </div>
</div>
<?php
require "c_footer.php";
?>

