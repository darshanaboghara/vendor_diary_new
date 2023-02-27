<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Site Setting</title>
</head>

<body>
    <center> <h1>Site Setting</h1></center>
    <div class="container mt-4">
        <form method="POST" action="<?php echo base_url();?>Site_setting/update">
            <div class="form-group row">
                <label for="web_name" class="col-sm-2 col-form-label">Website</label>
                <div class="col-sm-10">
                    <input type="url" class="form-control" name="web_name" id="web_name" value="<?php echo $site->web_name;?>" placeholder="Website URL">
                </div>
            </div>
            <div class="form-group row">
                <label for="contact_no" class="col-sm-2 col-form-label">Contact_no</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="contact_no" id="contact_no" value="<?php echo $site->contact_no;?>" placeholder="contact_no">
                </div>
            </div>
            <div class="form-group row">
                <label for="contact_email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="contact_email" id="contact_email" value="<?php echo $site->contact_email;?>" placeholder="Contact email">
                </div>
            </div>
            <div class="form-group row">
                <label for="contact_email" class="col-sm-2 col-form-label">Web Frienly Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="web_frienly_name" id="web_frienly_name" value="<?php echo $site->web_frienly_name;?>" placeholder="Web Frienly Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="full_address" class="col-sm-2 col-form-label">full_address</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="full_address" id="full_address" value="<?php echo $site->full_address;?>" rows="3"><?php echo $site->full_address;?></textarea>
                    <!-- <input type="email" class="form-control" name="contact_email" id="web_name" value="<?php echo $site->contact_email;?>" placeholder="Contact email"> -->
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>