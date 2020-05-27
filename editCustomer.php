<?php
/**
 *db_project
 *editCustomer.php
 *Description
 *Created on 5/4/20 11:05 下午
 *Author: Esmee Zhang
 */
?>
<?php require_once('dbConnection.php');
function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}
if(!isset($_GET['id'])){
    echo "get error";
}

$id = $_GET['id'];

echo $id;
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function h($string="") {
    return htmlspecialchars($string);
}
function update_subject($subjects){
    global $db;

    $sql = "UPDATE CUSTOMER SET ";
    $sql .= "customer_firstname='" . $subjects['customer_firstname'] . "', ";
    $sql .= "customer_lastname='" . $subjects['customer_lastname'] . "', ";
    $sql .= "customer_street='" . $subjects['customer_street'] . "', ";
    $sql .= "customer_city='" . $subjects['customer_city'] . "', ";
    $sql .= "customer_state='" . $subjects['customer_state'] . "', ";
    $sql .= "customer_zip='" . $subjects['customer_zip'] . "', ";
    $sql .= "customer_gender='" . $subjects['customer_gender'] . "', ";
    $sql .= "martial='" . $subjects['martial'] . "', ";
    $sql .= "customer_type='" . $subjects['customer_type'] . "' ";
    $sql .= "where customer_id='". $subjects['customer_id'] . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    if($result){
        return true;
    }else{
        echo mysqli_error($db);
        db_disconnect($db);
        exit;

    }

}
function find_subject_by_id($id){
    global $db;

    $sql ="SELECT * FROM customer ";
    $sql .="where customer_id ='" . $id ."'";
    $result = mysqli_query($db,$sql);
    $subjects = mysqli_fetch_assoc($result);
    return $subjects;
}
function u($string="") {
    return urlencode($string);
}
if(is_post_request()){
    $subjects = [];
    $subjects['customer_id'] = $id;
    $subjects['customer_firstname'] = $_POST['customer_firstname'];
    $subjects['customer_lastname'] = $_POST['customer_lastname'];
    $subjects['customer_street'] = $_POST['customer_street'];
    $subjects['customer_city'] = $_POST['customer_city'];
    $subjects['customer_state'] = $_POST['customer_state'];
    $subjects['customer_zip'] = $_POST['customer_zip'];
    $subjects['customer_gender'] = $_POST['customer_gender'];
    $subjects['martial'] = $_POST['martial'];
    $subjects['customer_type'] = $_POST['customer_type'];

    $result = update_subject($subjects);
    header("Location: AdminHome.php");
}else{
    $subjects = find_subject_by_id(mysqli_real_escape_string($db,$id));
    #print_r($subjects);
}
?>

<?php $page_title = 'Edit Customer'; ?>

<form action = "<?php echo 'editCustomer.php?id=' .h(u($id));?>" method = "post">

    <dl>
        <dt> customer id</dt>
        <dd><label>
                <input type="text" name="customer_id" value="<?php echo h(u($subjects['customer_id'])); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> first name</dt>
        <dd><label>
                <input type="text" name="customer_firstname" value="<?php echo h($subjects['customer_firstname']); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> last name</dt>
        <dd><label>
                <input type="text" name="customer_lastname" value="<?php echo h($subjects['customer_lastname']); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> street</dt>
        <dd><label>
                <input type="text" name="customer_street" value="<?php echo h($subjects['customer_street']); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> city</dt>
        <dd><label>
                <input type="text" name="customer_city" value="<?php echo h($subjects['customer_city']); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> state</dt>
        <dd><label>
                <input type="text" name="customer_state" value="<?php echo h($subjects['customer_state']); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> zip</dt>
        <dd><label>
                <input type="text" name="customer_zip" value="<?php echo h($subjects['customer_zip']); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> gender</dt>
        <dd><label>
                <input type="text" name="customer_gender" value="<?php echo h($subjects['customer_gender']); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> martial</dt>
        <dd><label>
                <input type="text" name="martial" value="<?php echo h($subjects['martial']); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> type</dt>
        <dd><label>
                <input type="text" name="customer_type" value="<?php echo h($subjects['customer_type']); ?>" />
            </label></dd>
    </dl>



    <input type = "submit" value = "edit" id = "btn" name = "submit">

</form>