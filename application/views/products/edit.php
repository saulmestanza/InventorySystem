

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Administrar
      <small>Productos</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Editar Producto</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('users/update') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body table-responsive">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label>Imágen: </label>
                  <img src="<?php echo base_url() . $product_data['image'] ?>" width="150" height="150">
                </div>

                <div class="form-group">
                  <label for="product_image">Actualizar Imágen</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Nombre</label>
                  <input type="text" required class="form-control" id="product_name" name="product_name" value="<?php echo $product_data['name']; ?>"  autocomplete="off"/>
                </div>

                <div class="form-group">
                  <label for="sku">SKU</label>
                  <input type="text" required class="form-control" id="sku" name="sku" value="<?php echo $product_data['sku']; ?>" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="price">Precio</label>
                  <input type="number" required min="1" class="form-control" id="price" name="price" value="<?php echo $product_data['price']; ?>" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="price">Precio de Compra</label>
                  <input type="number" required min="1" class="form-control" id="price_bought" name="price_bought" value="<?php echo $product_data['price_bought']; ?>" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="qty">Cantidad</label>
                  <input type="number" required min="1" class="form-control" id="qty" name="qty" value="<?php echo $product_data['qty']; ?>" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="description">Descripción</label>
                  <textarea required type="text" class="form-control" id="description" name="description" autocomplete="off">
                    <?php echo $product_data['description']; ?>
                  </textarea>
                </div>

                <div class="form-group">
                  <label for="brands">Marca</label>
                  <?php $brand_data = json_decode($product_data['brand_id']); ?>
                  <select required class="form-control select_group" id="brands" name="brands">
                    <?php foreach ($brands as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>" <?php if($v['id'] == $brand_data) { echo 'selected="selected"'; } ?>><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="category">Categoria</label>
                  <?php $category_data = json_decode($product_data['category_id']); ?>
                  <select  required class="form-control select_group" id="category" name="category[]" multiple="multiple">
                    <?php foreach ($category as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>" <?php if(in_array($v['id'], $category_data)) { echo 'selected="selected"'; } ?>><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Tienda</label>
                  <select required class="form-control select_group" id="store" name="store">
                    <?php foreach ($stores as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>" <?php if($product_data['store_id'] == $v['id']) { echo "selected='selected'"; } ?> ><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Disponible</label>
                  <select class="form-control" id="availability" name="availability">
                    <option value="1" <?php if($product_data['availability'] == 1) { echo "selected='selected'"; } ?>>Si</option>
                    <option value="2" <?php if($product_data['availability'] != 1) { echo "selected='selected'"; } ?>>No</option>
                  </select>
                </div>



              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Cerrar</a>
              </div>
            </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  
  $(document).ready(function() {
    $(".select_group").select2();
    $("#description").wysihtml5();

    $("#mainProductNav").addClass('active');
    $("#manageProductNav").addClass('active');
    
    $("#product_image").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

  });
</script>