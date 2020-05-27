<?php
/**
 *db_project
 *edit.php
 *Description
 *Created on 5/4/20 4:37 下午
 *Author: Esmee Zhang
 */
?>
<?php require_once('dbConnection.php');
function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}
if(!isset($_GET['id'])){
    echo "error";
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

    $sql = "UPDATE INSURANCE SET ";
    $sql .= "start_date='" . $subjects['start_date'] . "', ";
    $sql .= "end_date='" . $subjects['end_date'] . "', ";
    $sql .= "insurance_amount='" . $subjects['insurance_amount'] . "', ";
    $sql .= "insurance_status='" . $subjects['insurance_status'] . "', ";
    $sql .= "insurance_type='" . $subjects['insurance_type'] . "' ";
    $sql .= "where insurance_id='". $subjects['insurance_id'] . "' ";
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

    $sql ="SELECT * FROM INSURANCE ";
    $sql .="where insurance_id ='" . mysqli_real_escape_string($db,$id) ."'";
    $result = mysqli_query($db,$sql);
    $subjects = mysqli_fetch_assoc($result);
    return $subjects;
}
function u($string="") {
    return urlencode($string);
}
if(is_post_request()){
    $subjects = [];
    $subjects['insurance_id'] = $id;
    $subjects['start_date'] = $_POST['start_date'];
    $subjects['end_date'] = $_POST['end_date'];
    $subjects['insurance_amount'] = $_POST['insurance_amount'];
    $subjects['insurance_status'] = $_POST['insurance_status'];
    $subjects['insurance_type'] = $_POST['insurance_type'];



    $result = update_subject($subjects);
    header("Location: AdminHome.php");
}else{
    $subjects = find_subject_by_id($id);
    #print_r($subjects);
}
?>

<?php $page_title = 'Edit Insurance'; ?>

<form action = "<?php echo 'edit.php?id=' .h(u($id));?>" method = "post">

    <dl>
        <dt> insurance id</dt>
        <dd><label>
                <input type="text" name="insurance_id" value="<?php echo h(u($subjects['insurance_id'])); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> start date</dt>
        <dd><label>
                <input type="text" name="start_date" value="<?php echo h($subjects['start_date']); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> end date</dt>
        <dd><label>
                <input type="text" name="end_date" value="<?php echo h($subjects['end_date']); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> insurance amount</dt>
        <dd><label>
                <input type="text" name="insurance_amount" value="<?php echo h($subjects['insurance_amount']); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> insurance status</dt>
        <dd><label>
                <input type="text" name="insurance_status" value="<?php echo h($subjects['insurance_status']); ?>" />
            </label></dd>
    </dl>
    <dl>
        <dt> insurance type</dt>
        <dd><label>
                <input type="text" name="insurance_type" value="<?php echo h($subjects['insurance_type']); ?>" />
            </label></dd>
    </dl>


    <input type = "submit" value = "edit" id = "btn" name = "submit">
</form>