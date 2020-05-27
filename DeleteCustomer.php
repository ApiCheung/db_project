<?php
/**
 *db_project
 *DeleteCustomer.php
 *Description
 *Created on 5/5/20 11:45 上午
 *Author: Esmee Zhang
 */
?>
<?php
require_once('dbConnection.php');
$id = $_GET['id'];
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function h($string="") {
    return htmlspecialchars($string);
}
function u($string="") {
    return urlencode($string);
}

function find_subject_by_id($id){
    global $db;

    $sql ="SELECT * FROM customer ";
    $sql .="where customer_id ='" . mysqli_real_escape_string($db,$id) ."'";
    $result = mysqli_query($db,$sql);
    $subjects = mysqli_fetch_assoc($result);
    return $subjects;
}
function delete_subject($id){
    global $db;

    $sql = "DELETE FROM customer ";
    $sql .= "WHERE customer_id='" . mysqli_real_escape_string($db,$id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}


$subject = find_subject_by_id($id);

if(is_post_request()) {

    $result = delete_subject($id);
    header('Location: AdminHome.php');

} else {
    $subject = find_subject_by_id($id);
}

?>
<?php $page_title = 'Delete Customer'; ?>

<div id="content">

    <a class="back-link" href="<?php echo "AdminHome" ?>">&laquo; Back to List</a>

    <div class="subject delete">
        <h1>Delete Customer</h1>
        <p>Are you sure you want to delete this customer?</p>
        <p class="item"><?php echo h($subject['customer_id']); ?></p>

        <form action="<?php echo 'DeleteCustomer.php?id=' .h(u($subject['customer_id'])); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete customer" />
            </div>
        </form>
    </div>


