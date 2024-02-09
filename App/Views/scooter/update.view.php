<form action="/scooter/update" method="post" class="col-11 col-md-9 col-lg-6 col-xl-5 p-4 mt-4 mx-auto border" enctype="multipart/form-data">

<h2 class="mt-2">Editar scooter</h2>
<div class="mb-3">
    <label for="id" class="form-label">Id</label>
    <input type="text" class="form-control" name="id" id="id" readonly aria-describedby="helpId" placeholder="" value="<?php echo $params['scooter']['id'] ?? null ?>">
</div>
<div class="mb-3">
    <label for="brain" class="form-label">Brain</label>
    <input type="text" class="form-control" name="brain" id="brain" aria-describedby="helpId" placeholder="" value="<?php echo $params['scooter']['brain'] ?? null ?>">
</div>
<div class="mb-3">
    <label for="model" class="form-label">Model</label>
    <input type="text" class="form-control" name="model" id="model" aria-describedby="helpId" placeholder="" value="<?php echo $params['scooter']['model'] ?? null ?>">
</div>
<div class="form-group img-container">
                <label class="mb-1" for="">Original Image</label>
                <br>
                    <img src="../../../Public/Assets/scooters/<?= $params['scooter']['img'] ?>" alt="Scooter Image" style="width: 100px; height: 100px;" class="img-thumbnail">
                </div>
<div class="mb-3">
    <label for="img" class="form-label">New Image</label>
    <input type="file" class="form-control" name="img" id="img" aria-describedby="helpId" placeholder="" value="<?= $params['scooter']['img'] ?? null ?>">
</div>
<div class="mb-3">
    <label for="price" class="form-label">Price per minute</label>
    <input type="number" step="0.01" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="" value="<?php echo $params['scooter']['price'] ?? null ?>">
</div>
<div class="mb-3">
    <label for="user_rent" class="form-label">User rent</label>
    <input type="text" class="form-control" name="user_rent" id="user_rent" aria-describedby="helpId" placeholder="" value="<?php echo $params['scooter']['user_rent'] ?? null ?>">
</div>

<button type="submit" class="btn btn-primary mb-2" name="scooter_store">Save</button>
<button type="reset" class="btn btn-danger mb-2">Reset</button>


</form>