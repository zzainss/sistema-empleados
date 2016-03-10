<div class="row">
      <div class="col s11"><span class="flow-text">Listado de Empleados</span></div>
      <div class="col s1"><span class="flow-text">
        <a class="btn-floating btn-small waves-effect waves-light red" href="<?=base_url('/empleados/add') ?>"><i class="material-icons">add</i></a>
      </span></div>
    </div>

    <table class="striped">
        <thead>
          <tr>
              <th data-field="id">Cédula</th>
              <th data-field="full_name">Nombre Completo</th>
              <th data-field="email">Correo Electrónico</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
          <?php
          foreach ($consulta->result() as $fila){
            echo "<tr><td>".$fila->ci."</td>";
            echo "<td>".$fila->full_name."</td>";
            echo "<td>".$fila->email."</td>";
            ?>
            <td>
              <a href="#"><i class="small material-icons">pageview</i></a>
              <a href="#"><i class="small material-icons">delete</i></a>
              <a href="#"><i class="small material-icons">assignment</i></a>
            </td>
            <tr>
            <?php
          }
          ?>

        </tbody>
      </table>
