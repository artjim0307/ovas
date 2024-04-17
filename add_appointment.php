<?php
require_once('./config.php');
$schedule = $_GET['schedule'];
?>
<div class="container-fluid">
    <form action="" id="appointment-form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <input type="hidden" name="schedule" value="<?php echo isset($schedule) ? $schedule : '' ?>">
        <dl>
            <dt class="text-muted">Appointment Schedule</dt>
            <dd class=" pl-3"><b><?= date("F d, Y",strtotime($schedule)) ?></b></dd>
        </dl>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <fieldset>
                    <legend class="text-muted">Owner Information</legend>
                    <div class="form-group">
                        <label for="owner_name" class="control-label">Name</label>
                        <input type="text" name="owner_name" id="owner_name" class="form-control form-control-border" placeholder="John D Smith" value ="<?php echo isset($owner_name) ? $owner_name : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="contact" class="control-label">Contact #</label>
                        <input type="text" name="contact" id="contact" class="form-control form-control-border" placeholder="09xxxxxxxx" value ="<?php echo isset($contact) ? $contact : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-border" placeholder="jsmith@sample.com" value ="<?php echo isset($email) ? $email : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Address</label>
                        <textarea type="email" name="address" id="address" class="form-control form-control-sm rounded-0" rows="3" placeholder="Lot 2 Block 23, Here Subd., Over There City, Anywhere, 2306" required><?php echo isset($address) ? $address : '' ?></textarea>
                    </div>
                     <div class="form-group">
                        <label for="address" class="control-label">Remarks</label>
                        <textarea type="text" name="remarks" id="remarks" class="form-control form-control-sm rounded-0" rows="3" placeholder="Remarks" required><?php echo isset($address) ? $address : '' ?></textarea>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6">
                <fieldset>
                    <legend class="text-muted">Pet Information</legend>
                    <div class="form-group">
                        <label for="dog_id" class="control-label">Dog</label>
                        <select name="dog_id" id="dog_id" class="form-control form-control-border">
                            <option value="" selected disabled>Select Dog</option>
                            <?php 
                            $auth_id = $_SESSION['userdata']['id'];
                            $dogs = $conn->query("SELECT * FROM dogs WHERE owner = '$auth_id'");
                            while($dog = $dogs->fetch_assoc()):
                            ?>
                            <option value="<?= $dog['id'] ?>"><?= $dog['name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div id="dog_info_section" style="display: none;">
                        <hr>
                        <!-- Dog information display area remains unchanged -->
                    </div>
                </fieldset>
                <div class="form-group">
                    <label for="service_id" class="control-label">Service(s)</label>
                    <?php 
                    $services = $conn->query("SELECT * FROM service_list WHERE delete_flag = 0 ".(isset($service_id) && !empty($service_id) ? " OR id IN ('{$service_id}')" : "")." ORDER BY name ASC");
                    while($row = $services->fetch_assoc()){
                        unset($row['description']);
                        $service_arr[] = $row;
                    }
                    ?>
                    <select name="service_id[]" id="service_id" class="form-control form-control-border select2" multiple>
                        <?php
                        foreach ($service_arr as $service) {
                            echo '<option value="' . $service['id'] . '">' . $service['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>



<script>
    var service = $.parseJSON('<?= json_encode($service_arr) ?>') || {};
    $(function(){
        $('#dog_id').change(function(){
            var dog_id = $(this).val();
            $.ajax({
                url: '../get_dog_details.php',
                method: 'POST',
                dataType: 'json',
                data: {dog_id: dog_id},
                success: function(response){
                    $('#dog_name').html("<b>Name:</b> " + response.name);
                    $('#dog_breed').html("<b>Breed:</b> " + response.breed);
                    $('#dog_age').html("<b>Age:</b> " + response.age);
                    $('#dog_breed_input').val(response.breed);
                    $('#dog_age_input').val(response.age);
                    $('#dog_info_section').show();
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                }
            });
        });

        $('#uni_modal').on('shown.bs.modal',function(){
            $('#service_id').select2({
                placeholder:"Please Select Sevice(s) Here.",
                width:'100%',
                dropdownParent:$('#uni_modal')
            })
        })

        $('#uni_modal #appointment-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.pop-msg').remove()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_appointment",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error: function(err){
                    console.log(err)
                    alert_toast("An error occured",'error');
                    end_loader();
                },
                success: function(resp){
                   if(resp.status == 'success'){
    end_loader();
    setTimeout(() => {
        uni_modal("Success","../success_msg.php?code="+resp.code)
    }, 750);

                    }else if(!!resp.msg){
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    }else{
                        el.addClass("alert-danger")
                        el.text("An error occurred due to unknown reason.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    $('html,body,.modal').animate({scrollTop:0},'fast')
                    end_loader();
                }
            })
        })
    })
</script>