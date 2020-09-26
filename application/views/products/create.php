

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
            <h3 class="box-title">Agregar Producto</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('users/create') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body table-responsive">

                <?php echo validation_errors(); ?>

                <div class="form-group">

                  <label for="product_image">Imágen</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Nombre</label>
                  <input required type="text" class="form-control" id="product_name" name="product_name" autocomplete="off"/>
                </div>

                <div class="form-group">
                  <label for="sku">SKU</label>
                  <input required type="text" class="form-control" id="sku" name="sku"autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="price">Precio</label>
                  <input required type="number" min="1" class="form-control" id="price" name="price" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="price">Precio de Compra</label>
                  <input required type="number" min="1" class="form-control" id="price_bought" name="price_bought" autocomplete="off" />
                </div>
                
                <div class="form-group">
                  <label for="qty">Cantidad</label>
                  <input required type="number" min="1" class="form-control" id="qty" name="qty" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="description">Descrición</label>
                  <textarea required type="text" class="form-control" id="description" name="description" autocomplete="off">
                  </textarea>
                </div>

                <div class="form-group">
                  <label for="brands">Marca</label>
                  <select required class="form-control select_group" id="brands" name="brands">
                    <?php foreach ($brands as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="category">Categoría</label>
                  <select required class="form-control select_group" id="category" name="category[]" multiple="multiple">
                    <?php foreach ($category as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Tienda</label>
                  <select required class="form-control select_group" id="store" name="store">
                    <?php foreach ($stores as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Disponible</label>
                  <select required class="form-control" id="availability" name="availability">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="<?php echo base_url('products/') ?>" class="btn btn-warning">Cerrar</a>
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
    $("#addProductNav").addClass('active');
    
    $(document).keypress(
      function(event){
        if (event.which == '13') {
          event.preventDefault();
        }
    });
    
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