<?php
include 'db/config.php';
session_start();

if(isset($_POST['save'])){

    // Escape user inputs for security
    $guest= mysqli_real_escape_string($conn, $_REQUEST['guest']);
    $email= mysqli_real_escape_string($conn, $_REQUEST['email']);
    $address= mysqli_real_escape_string($conn, $_REQUEST['address']);
    $phone= mysqli_real_escape_string($conn, $_REQUEST['phone']);
    $total_guest= mysqli_real_escape_string($conn, $_REQUEST['total_guest']);
    $total_apart= mysqli_real_escape_string($conn, $_REQUEST['total_apart']);
    $companion= mysqli_real_escape_string($conn, $_REQUEST['companion']);
    $charges= mysqli_real_escape_string($conn, $_REQUEST['charges']);
    $checkin_date= mysqli_real_escape_string($conn, $_REQUEST['checkin_date']);
    $checkin_time= mysqli_real_escape_string($conn, $_REQUEST['checkin_time']);
    $checkout_date= mysqli_real_escape_string($conn, $_REQUEST['checkout_date']);
    $payment_mode= mysqli_real_escape_string($conn, $_REQUEST['payment_mode']);
    $guest_type= mysqli_real_escape_string($conn, $_REQUEST['guest_type']);
    $stay_type= mysqli_real_escape_string($conn, $_REQUEST['stay_type']);
    $booking_source= mysqli_real_escape_string($conn, $_REQUEST['booking_source']);
    $room_no= mysqli_real_escape_string($conn, $_REQUEST['room_no']);
    $room_type= mysqli_real_escape_string($conn, $_REQUEST['room_type']);
    $guest_id= substr('guest', 0, 3).'-'.rand(7,50).'-'.date('MY');

    $card = $_FILES['card']['name'];
    // image file directory
    $target = "upload/".basename($card);


    $sql = "INSERT INTO reserve_rooms (guest,guest_id,email,address,phone,guest_type,stay_type,booking_source,total_guest,total_apart,companion,charges,checkin_date,checkin_time,checkout_date,payment_mode,room_no,room_type,card,status) VALUES ('$guest','$guest_id','$email','$address','$phone','$guest_type','$stay_type','$booking_source','$total_guest',
										'$total_apart','$companion','$charges','$checkin_date','$checkin_time','$checkout_date','$payment_mode','$room_no','$room_type','$card','1')";

    

    $room = "UPDATE add_rooms SET status='0' WHERE id='" . $room_no . "'";

    $conn->query($room);

    if (move_uploaded_file($_FILES['card']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }


    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Guest Information has been added successfully";
        header('location: guest_list.php');



    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

// Close connection

?>

<?php
require_once 'includes/head_form.php';
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
?>


<!-- ==============================================================http://localhost/hotel/guest_list.php
                                                                         -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Guest Reservation Form</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Library
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <form class="form-horizontal" action="add_guest.php" id="form" method="POST"  enctype="multipart/form-data">
                        <div class="card-body">

                        <div class="form-row">
                          <div class="col-md-6">
                            <div class="name" >Guest name</div>
                           
                                <input class="input--style-6" type="text" name="guest" style="margin-bottom: 9px;">
								           
							</div>
							<div class="col-md-6">
							<div class="name">Email</div>
								<div class="input-group">
                                    <input class="input--style-6" type="email" name="email" style="margin-bottom: 9px;" placeholder="example@email.com">
                                </div>
                            </div>
						</div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="name">Phone Number</div>
                                  <input class="input--style-6" type="text" name="phone" style="margin-bottom: 9px;">
                                    </div>
                                <div class="col-md-6">
                                    <div class="name">Email</div>
                                        <div class="input-group">
                                            <input class="input--style-6" type="email" name="email" style="margin-bottom: 9px;" placeholder="example@email.com">
                                        </div>
                                    </div>
                            </div>



                            <div class="form-row">
                                <div class="name">Address</div>
                                <div class="value">
                                    <div class="input-group">
                                        <textarea class="textarea--style-6" name="address" style="margin-bottom: 9px;" placeholder="Enter Address"></textarea>
                                    </div>
                                </div>
                            </div>




                            <!--div class="form-row">
                                <div class="name">Type Of Guest</div>
                                <div class="value">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="guest_type" style="margin-bottom: 9px;" id="flexRadioDefault1" value="1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            First time visit
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="guest_type" id="flexRadioDefault2" value="2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Repeated stay
                                        </label>
                                    </div>
                                </div>
                            </div-->



                            <!--div class="form-row">
                                <div class="name">Type Of Stay</div>
                                <div class="value">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="stay_type" id="flexRadioDefault1" value="1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Primary
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="stay_type" id="flexRadioDefault2" value="2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Extension
                                        </label>
                                    </div>
                                </div>
                            </div-->


                            <div class="form-row">
                                <div class="name">Source of Booking</div>
                                <div class="value">
                                    <select name="booking_source"class="select2 form-select shadow-none" style="width: 100%; height: 36px; margin-bottom: 10px">
                                        <option value="">Select</option>
                                        <?php
                                        $source = $conn->query("SELECT * FROM add_sources order by name asc ");
                                        while($row= $source->fetch_assoc()) {
                                            $source_name[$row['id']] = $row['name'];
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>










                            <div class="form-row">
                                <div class="name">Total Guests</div>
                                <div class="value">
                                    <select name="total_guest" class="select2 form-select shadow-none" style="width: 100%; height: 36px; margin-bottom: 10px">
                                        <option value="">Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Total Apartments</div>
                                <div class="value">
                                    <select name="total_apart"
                                            class="select2 form-select shadow-none"
                                            style="width: 100%; height: 36px; margin-bottom: 10px">
                                        <option value="">Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Companion Guest</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="companion" style="margin-bottom: 9px;">

                                    <div class="label--desc">Please add names of all guests other than the guest whos name is written above. This is applicable for all booking with 2 or more guests. Incase of single guest- Please ignore this.</div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Guest   Identification  Cards </div>
                                <div class="value">
                                    <div class="input-group js-input-file">
                                        <input class="input-file" type="file" name="card" id="file" style="margin-bottom: 9px;">
                                        <label class="label--file" for="file">Choose file</label>
                                        <span class="input-file__info">No file chosen</span>
                                    </div>
                                    <div class="label--desc">Any Union Government Identification Card</div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Check-in date</div>
                                <div class="value">
                                    <input type="date" name="checkin_date" class="form-control"  style="margin-bottom: 9px;" id="datepicker-autoclose" placeholder="mm/dd/yyyy"
                                    />
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="name">Check-in Time </div>
                                <div class="value">
                                    <input name="checkin_time" class="input--style-6" type="time" style="margin-bottom: 9px;">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Check-out date</div>
                                <div class="value">
                                    <input type="date" name="checkout_date" style="margin-bottom: 9px;" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy"
                                    />
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="name">Mode Of Payment</div>
                                <div class="value">
                                    <select name="payment_mode"
                                            class="select2 form-select shadow-none"
                                            style="width: 100%; height: 36px; margin-bottom: 10px">
                                        <option value="">Select</option>
                                        <?php
                                        $source = $conn->query("SELECT * FROM booking_types order by name asc ");
                                        while($row= $source->fetch_assoc()) {
                                            $source_name[$row['id']] = $row['name'];
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Room Type</div>
                                <div class="value">
                                    <select name="room_type"
                                            class="select2 form-select shadow-none"
                                            style="width: 100%; height: 36px; margin-bottom: 10px">
                                        <option value="">Select</option>
                                        <?php
                                        $source = $conn->query("SELECT * FROM room_types order by name asc ");
                                        while($row= $source->fetch_assoc()) {
                                            $source_name[$row['id']] = $row['name'];
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Room Number</div>
                                <div class="value">
                                    <select name="room_no"
                                            class="select2 form-select shadow-none"
                                            style="width: 100%; height: 36px; margin-bottom: 10px">
                                        <option value="">Select</option>
                                        <?php
                                        $source = $conn->query("SELECT * FROM add_rooms where status = '1'  order by room_no asc ");
                                        while($row= $source->fetch_assoc()) {
                                            $source_name[$row['id']] = $row['room_no'];
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['room_no'] ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Charges</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="charges" style="margin-bottom: 9px;">

                                    <!--div class="label--desc">Please add names of all guests other than the guest whos name is written above. This is applicable for all booking with 2 or more guests. Incase of single guest- Please ignore this.</div-->
                                </div>
                            </div>

                            <!--div class="form-row">
                                <div class="name">DECLARATION</div>
                                <div class="value">
                                    <input type="checkbox" name="term" class="form-check-input" style="margin-left: 360px"  id="customControlAutosizing1"/>
                                    <label class="form-check-label mb-0" for="customControlAutosizing1" style="margin-left: 8px">I have fuly read and accepted this in all my senses.</label>
                                    <div class="label--desc" style="margin-left: 8px">I have read, understood and accepted all house rules of Emerald Vista Luxury Suites. I hereby declare that the details furnished above along with the id card are true and correct to the best of my knowledge and belief and I undertake inform you any changes therein, immediately. Incase any of the above information or documents is found to false or untrue or misleading or  misrepresenting, I am aware that I may be held liable for it. I will follow all rules and regulations during my stay. The management will not be responsible for any kind of theft or damage to the personal belongings of guest. Incase of any damage to any property inside or outside my apartment, I will be held fully liable to pay the damage charges for it.</div>
                                </div>
                            </div-->


                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" name="save" class="btn btn-success text-white"><i class="fas fa-save"></i>
                                        Save
                                    </button>
                                    <button type="reset" class="btn btn-primary"><i class="fas fa-sync-alt "></i>
                                        Reset</button>
                                    <a type="button" class="btn btn-danger" href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><i class="fas fa-reply"></i>
                                        Back</a>
                                </div>
                            </div>


                            









                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center">
    All Rights Reserved by Matrix-admin. Designed and Developed by
    <a href="https://www.wrappixel.com">WrapPixel</a>.
</footer>


<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->

<style>
    label.error {
        /* font */
        font-family: Helvetica;
        font-size: 13px;
        font-weight: bold;
        color: #da542e;
        background-color: #fce4e4;
        border: 1px solid #fcc2c3;
        border-radius: 7px;
        -moz-border-radius: 7px;
        -webkit-border-radius: 7px;
        /* positioning */
        float: left;
        position: relative;
        padding: 7px 11px 4px;
        margin-left: 2px;
    }
</style>

<script>
    $(document).ready(function () {
        $('#form').validate({
            rules: {
                guest: {
                    required: true
                },
                email: {
                    required: true
                },
                address: {
                    required: true
                },
                phone: {
                    required: true
                },
                total_guest: {
                    required: true
                },
                total_apart: {
                    required: true
                },
                checkin_date: {
                    required: true
                },
                checkin_time: {
                    required: true
                },
                checkout_date: {
                    required: true
                },
                payment_mode: {
                    required: true
                },
                term: {
                    required: true
                },
                booking_source: {
                    required: true
                },




            },
            messages: {
                guest: 'Guest name is required!',
                email: 'Email is required!',
                address: 'Please enter your address!',
                phone: 'Phone number is required!',
                total_guest: 'Please select number of guest!',
                total_apart: 'Please select number of apartments!',
                checkin_date: 'Please select Check-In date!',
                checkin_time: 'Please select Check-In !',
                checkout_date: 'Please select Check-Out date!',
                payment_mode: 'Please select mode of payment!',
                booking_source: 'Please select booking source!',
                term: 'Please accept this!',

            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>


</body>
</html>
