<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Task</title>

    <style>
        .action{display: flex;justify-content: center;}
        .action button{margin-left: 10px;}
    </style>

</head>

<body>

<div class="container-fluid text-center mt-4">
        <img src="https://www.nicepng.com/png/full/258-2582524_codeignitier-1-codeigniter-framework-logo.png" alt="" class="img-fluid" width="350">
</div>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-10">
                <form action="<?php echo base_url(); ?>/users/create" method="post">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Experience</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="allRow">
                        
                        <?php if (!empty($user)) {  foreach ($user as $key=> $userOne) { ?>
                            <tr>
                                <td><?=$key+1;?></td>
                            <td><input type="text" class="form-control form-control-sm" disabled placeholder="Name" value="<?=$userOne['name']?>"></td>
                            <td><input type="email" class="form-control form-control-sm" disabled placeholder="Email" value="<?=$userOne['email']?>"></td>
                            <td><input type="number" class="form-control form-control-sm" disabled placeholder="Phone" value="<?=$userOne['phone']?>"></td>
                            <td>
                                <select class="form-select form-select-sm" disabled>
                                    <option value="0 to 1" <?= ($userOne['experience'] == '0 to 1'?'selected':'')?>>0 to 1</option>
                                    <option value="1 to 2" <?= ($userOne['experience'] == '1 to 2'?'selected':'')?>>1 to 2</option>
                                    <option value="Upto 2+" <?= ($userOne['experience'] == 'Upto 2+'?'selected':'')?>>Upto 2+</option>
                                </select>
                            </td>
                            <td class="action">
                                <button class="btn btn-sm btn-primary" onclick="NewRow()"><i class="fa-solid fa-circle-plus"></i></button>
                                <a class="btn btn-sm btn-danger ms-2" href="<?=base_url('users/delete/'.$userOne['id'])?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }} ?>
                    
                        <tr>
                            <td id="primaryNO">1</td>
                            <td><input type="text" name="name[]" class="form-control form-control-sm" required placeholder="Name"></td>
                            <td><input type="email" name="email[]" class="form-control form-control-sm" required placeholder="Email"></td>
                            <td><input type="number" name="phone[]" class="form-control form-control-sm" required placeholder="Phone"></td>
                            <td>
                                <select class="form-select form-select-sm" name="experience[]" required>
                                    <option value="0 to 1">0 to 1</option>
                                    <option value="1 to 2">1 to 2</option>
                                    <option value="Upto 2+">Upto 2+</option>
                                </select>
                            </td>
                            <td class="action">
                                <button class="btn btn-sm btn-primary" onclick="NewRow()"><i class="fa-solid fa-circle-plus"></i></button>
                                <button class="btn btn-sm btn-danger delRow"><i class="fa-solid fa-circle-minus"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-sm btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script>
        $('#primaryNO').html($('.allRow tr').length - 0);
        function NewRow()
        {
            var RowNo = ($('.allRow tr').length - 0) + 1;
            var Rowhtml = '<tr><td>'+RowNo+'</td><td><input type="text" name="name[]" class="form-control form-control-sm" required placeholder="Name"></td><td><input type="email" name="email[]" class="form-control form-control-sm" required placeholder="Email"></td><td><input type="number" name="phone[]" class="form-control form-control-sm" required placeholder="Phone"></td><td><select class="form-control form-control-sm" name="experience[]" required><option value="0 to 1">0 to 1</option><option value="1 to 2">1 to 2</option><option value="Upto 2+">Upto 2+</option></select></td><td class="action"><button class="btn btn-sm btn-primary" onclick="NewRow()"><i class="fa-solid fa-circle-plus"></i></button><button class="btn btn-sm btn-danger delRow"><i class="fa-solid fa-circle-minus"></i></button></td>';
            var tableBody = $('.allRow').append(Rowhtml);
        }

        $('.allRow').delegate('.delRow', 'click', function (){
            $(this).parent().parent().remove();
        })
    </script>

</body>

</html>