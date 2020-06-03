<div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>Foto</label>
                <input type="hidden" name="foto" value="<?php echo $alm->__GET('foto'); ?>" />
                <input type="file" name="foto" placeholder="Ingrese una imagen" />
            </div>     
        </div>
        <div class="col-xs-6">
            <?php if($alumno->__GET('foto') != ''): ?>
                <div class="img-thumbnail text-center">
                    <img src="uploads/<?php echo $this->alumno->foto; ?>" style="width:50%;" />
                </div>
            <?php endif; ?>            
        </div>
        </div>

