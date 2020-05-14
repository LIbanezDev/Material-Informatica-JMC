<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Subir material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('archivos.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">       
        <div class="form-group">
            <label for="exampleFormControlSelect1">Nombre de la asignatura</label>
            <select class="form-control" id="exampleFormControlSelect1" name="nombre_asignatura">
              @foreach($todas_las_asignaturas as $asignatura )
              <option>{{ $asignatura->nombre }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Semestre en que se imparte</label>
            <select class="form-control" id="exampleFormControlSelect1" name="semestre_asignatura">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
            </select>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="exampleFormControlSelect1">Tipo de material</label>
              <select class="form-control" id="exampleFormControlSelect1" name="tipo_material">
                <option>Certamen</option>
                <option>Laboratorio</option>
                <option>Control</option>
                <option>Apunte / Otro</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="exampleFormControlSelect1">Numero de evaluación</label>
              <select class="form-control" id="exampleFormControlSelect1" name="numero_material">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>0</option>
              </select>
              <div class="text-muted">
                <h6 class="mt-1">0 si es Apunte/Otro </h6>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Ingrese archivo a subir</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="archivo">
            <div class="text-muted">
              <h6>Formato imagen(.jpg - .png) documento (.pdf - .docx - etc)</h6>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Subir Archivo</button>
        </div>
      </form>
    </div>
  </div>
</div>