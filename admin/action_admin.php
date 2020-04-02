<?php
require '../db/dbcon.php';
if (isset($_POST['submit_student']))
{
    $pattern_first_name = "/^[a-zA-Z ]*$/";
    $pattern_user_name = "/^[a-zA-Z0-9](?=.*[!@#$%^&*-])/";
    $pattern_password = "/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])/";
    $pattern_id = "/^[0-9]*$/";
    $pattern_email = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]/";
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $contract = $_POST['contract'];
    $email = $_POST['email'];
    $_SESSION['old'] = ['firstname' => $firstname, 
    'lastname' 	  => $lastname,
     'username'   => $username, 
     'password'   => $password, 
     'c_password' => $c_password,
     'contract'   => $contract, 
     'email'      => $email, 
 ];

    $photo = $_FILES['photo']['name'];
    $photo_size = $_FILES['photo']['size'];
    $temp = $_FILES['photo']['tmp_name'];
    $permitted = array(
        'jpg',
        'jpeg',
        'png'
    );
    $div = explode('.', $photo);
    $photo_ext = strtolower(end($div));

    $uniq_photo = substr(md5(time()) , 0, 10) . '.' . $photo_ext;

    $uploaded_img = $photo . $uniq_photo;

    if (empty($firstname))
    {
        $_SESSION['validation']['firstname'] = "This Field is required!";
    }
    if (empty($lastname))
    {
        $_SESSION['validation']['lastname'] = "This Field is required!";
    }
    if (empty($username))
    {
        $_SESSION['validation']['username'] = "This Field is required!";
    }
    if (empty($password))
    {
        $_SESSION['validation']['password'] = "This Field is required!";
    }
    if (empty($c_password))
    {
        $_SESSION['validation']['c_password'] = "This Field is required!";
    }
    if (empty($contract))
    {
        $msg['contract'] = "This Field is required!";
    }
    if (empty($email))
    {
        $_SESSION['validation']['email'] = "This Field is required!";
    }
    if (empty($photo))
    {
        $_SESSION['validation']['photo'] = "This Field is required!";
    }

    if (!isset($_SESSION['validation']))
    {
        if (preg_match($pattern_first_name, $firstname))
        {

            if (preg_match($pattern_first_name, $lastname))
            {

                if (preg_match($pattern_user_name, $username))
                {

                    if (preg_match($pattern_password, $password))
                    {

                        if (preg_match($pattern_id, $roll))
                        {

                            if (preg_match($pattern_email, $email))
                            {

                                $email_check = mysqli_query($link, "SELECT * FROM `admin_info` WHERE `email` = '$email'");
                                if (mysqli_num_rows($email_check) == 0)
                                {

                                    $user_name_check = mysqli_query($link, "SELECT * FROM `admin_info` WHERE `username` = '$username'");
                                    if (mysqli_num_rows($user_name_check) == 0)
                                    {

                                        if (strlen($password) > 8)
                                        {

                                            if ($password == $c_password)
                                            {

                                                if ($photo_size < 500000)
                                                {

                                                    if (in_array($photo_ext, $permitted))
                                                    {

                                                        move_uploaded_file($temp, 'images/' . $uploaded_img);

                                                        $sql = "INSERT INTO `admin_info` (`firstname`, `lastname`, `username`, `password`, `contract`, `email`, `photo`) VALUES ('$firstname','$lastname','$username','$password','$contract','$email', '$uploaded_img')";
                                                        $query = mysqli_query($link, $sql);
                                                        if ($query)
                                                        {
                                                            $_SESSION['msg']['insert'] = "Data Submit Success!";
                                                            unset($_SESSION['old']);

                                                        }
                                                        else
                                                        {
                                                            $_SESSION['msg']['insert'] = "something is Wrong!";
                                                        }
                                                    }
                                                    else
                                                    {

                                                        $_SESSION['validation']['photo_formate'] = "Picture Formate Dosen''t supported!";
                                                    }
                                                }
                                                else
                                                {

                                                    $_SESSION['validation']['photo_size'] = "Size is too longer!";
                                                }
                                            }
                                            else
                                            {
                                                $_SESSION['validation']['password_match'] = "Password Don't Match!";
                                            }
                                        }
                                        else
                                        {
                                            $_SESSION['validation']['password_length'] = "Password More than 8 character!";
                                        }
                                    }
                                    else
                                    {
                                        $_SESSION['validation']['user_name_check_msg'] = "This user name already Taken!";
                                    }
                                }
                                else
                                {
                                    $_SESSION['validation']['email_check_msg'] = "This email already already taken!";
                                }
                            }
                            else
                            {
                                $_SESSION['validation']['error_email'] = "Please Enter Valid Email";
                            }
                        }
                        else
                        {
                            $_SESSION['validation']['error_contract'] = "Only allowed neomeric Digit!";
                        }
                    }
                    else
                    {
                        $_SESSION['validation']['error_password'] = "Password Must be One uppercase, oner lowercase and one special character!";
                    }
                }
                else
                {
                    $_SESSION['validation']['error_user_name'] = "User name must contain uppercase, lowercase with special character!";
                }
            }
            else
            {
                $_SESSION['validation']['error_lasstname'] = "Name contain only letters!";
            }
        }
        else
        {
            $_SESSION['validation']['error_firstname'] = "Name Contain only letters!";
        }
    }
    header('location:registration.php');
    exit();

}
/*................................Login code from here!.............*/
if (isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_username = mysqli_query($link, "SELECT * FROM `admin_info` WHERE `username` = '$username'");

    if (mysqli_num_rows($check_username) > 0)
    {
        $catch_data = mysqli_fetch_assoc($check_username);
        if ($catch_data['password'] == $password)
        {
            $_SESSION['userName'] = $catch_data['username'];
            $_SESSION['activeUser'] = [
                
            'firstname'  => $catch_data['firstname'],
            'lastname'   => $catch_data['lastname'], 
            'email'      => $catch_data['email'],
            'contract'   => $catch_data['contract'],
            'user_photo' => $catch_data['photo'], 
           ];
            header('location: index.php');

        }
        else
        {
            $_SESSION['info']['msg'] = "Password Dont't Match!";

        }
    }
    else
    {
        $_SESSION['info']['msg'] = "User name not Found!";

    }

}
/*.................feedback Data inset code start from Here!........*/
if (isset($_POST['submit_feedback']))
{
    $name = $_POST['name'];
    $feedback = mysqli_real_escape_string($link, $_POST['comment']);
    $admin_type = $_POST['admin_type'];
    $feed = mysqli_query($link, "INSERT INTO `feedbacks`(`name`, `feedback`,`type`) VALUES ('$name','$feedback','$admin_type')");
    if ($feed)
    {
        $_SESSION['feed_msg'] = "Your feedback Submitted succesfulley!";
    }
}
/* .........................Updated Password Code From here!.............*/
if (isset($_POST['update']))
{

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_new = $_POST['password_new'];

    $_SESSION['updateOld'] = ['username' => $username, 'email' => $email, ];

    $sql = mysqli_query($link, "SELECT * FROM `admin_info` WHERE `username` = '$username'");

    $user_name_check = mysqli_num_rows($sql);

    $row = mysqli_fetch_assoc($sql);

    if ($user_name_check > 0)
    {

        if ($row['email'] == $email)
        {

            if ($password == $password_new)
            {

                $update = mysqli_query($link, "UPDATE `admin_info` SET `password`= '$password' WHERE `username` = '$username' AND `email` = '$email'");

                if ($update)
                {

                    $_SESSION['update-msg'] = "Your new password Updated!";

                }
                else
                {
                    $_SESSION['update-msg'] = "We are Sorry something is Wrong!";
                }
            }
            else
            {
                $_SESSION['update-msg'] = "Your Re-type password Don't match!!";

            }
        }
        else
        {

            $_SESSION['update-msg'] = "Hey Man! Your Email Dosen''t match!";

        }
    }
    else
    {
        $_SESSION['update-msg'] = "Hey Man! Your User Name Dosen''t match!";

    }

}
/*.............................book Approve...........*/

if (isset($_POST['submit_request']))
{

    $_SESSION['stuName'] = $_POST['stu_name'];
    $_SESSION['StuId'] = $_POST['Stu_id'];
    $_SESSION['bookId'] = $_POST['book_id'];

?>
<script>
	window.location = "Approve.php";
</script>

<?php
}

if (isset($_POST['approve_request']))
{

    $approve = $_POST['approve'];
    $Issue_Date = $_POST['Issue_Date'];
    $Return_Date = $_POST['Return_Date'];

    $approveReuest = mysqli_query($link, "UPDATE `issue_book` SET `approve`=('$approve'),`issueDate`=('$Issue_Date'),`returnDate`=('$Return_Date'), `status`=('accepted')  WHERE `username` = '$_SESSION[stuName]' AND `rolls` = '$_SESSION[StuId]' AND `bid` = '$_SESSION[bookId]'");

    $bookUpdate = mysqli_query($link, "UPDATE `books` SET `quantity`= quantity-1 WHERE `bid` = '$_SESSION[bookId]'");

    $bookSelect = mysqli_query($link, "SELECT * FROM `books` WHERE `bid` = '$_SESSION[bookId]'");

    while ($row = mysqli_fetch_assoc($bookSelect))
    {

        if ($row['quantity'] == 0)
        {

            $updateStatus = mysqli_query($link, "UPDATE `books` SET `status`= 'Not Available' WHERE `bid` = '$_SESSION[bookId]'");
        }
    }

    $_SESSION['approvemsg'] = "Approved This Request";

}


?>
